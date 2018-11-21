<?php

namespace App\Http\Controllers;

use App\Contracts\ParsedDataInterface;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Http\Request;

class ParsingController extends Controller
{
    protected $parsedDataRepo;

    /**
     * ParsingController constructor.
     * @param ParsedDataInterface $parsedData
     */
    public function __construct(ParsedDataInterface $parsedData)
    {
        $this->parsedDataRepo = $parsedData;
    }

    /**
     * Scrap Data settings
     *
     * @return view
     */
    public function settings()
    {
        return view('welcome');
    }


    /**
     * Scrap Data from url with value
     *
     * @return array|\Illuminate\Support\Collection
     */
    public function index(Request $request)
    {

        try {
            ini_set('max_execution_time', 3000);

            $client = new Client();
            $client->setHeader('User-Agent', "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.101 Safari/537.36");

            $guzzleClient = new GuzzleClient(array(
                'timeout' => 60,
            ));

            $client->setClient($guzzleClient);
            $crawler = $client->request('GET', 'https://www.mbetthebookie.win/su/betting/11?periodGroupAllEvents=' . $request['time']);

            $priceClass = '.price';

            $prices = $crawler->filter($priceClass)->each(

            /**
             * @param $node
             * @return array
             */
                function ($node) use ($request) {
                    $text = strstr($node->text(), ')');

                    if ($text) {
                        $criterion = str_replace(')', ' ', $text);
                    } else {
                        $criterion = $node->text();
                    }

                    $request = $request->all();
                    /** @var Values $criterion */
                    $minVal = !empty($request['min']) ? $request['min'] : 1.30;
                    $maxVal = !empty($request['max']) ? $request['max'] : 1.38;
                    $data = [];
                    if (floatval($criterion) < $maxVal && floatval($criterion) > $minVal && $criterion != null) {
                        $criterion = (float)filter_var($criterion, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                        $league = $node->parents()->parents()->parents()
                            ->parents()->parents()->parents()->text();

                        $lig = explode("\n", $league);

                        $data['price'] = $criterion;
                        $data['league'] = $lig[14];
                        $data['sel'] = $node->attr('data-sel');
                        $s = (array)json_decode($node->attr('data-sel'));
                        $data['name'] = $s['sn'];
                        $sel = json_decode($data['sel']);

                        $parents = $node->parents()->text();

                        $par = explode("\n", $parents);
                        $team = explode(' ', $sel->sn);

                        if (str_replace(' ', '', $team[0]) === explode(' ', $par[14])[1]) {
                            $data['command'] = $par[14] . ' -' . $par[36];
                            $data['time'] = str_replace(' ', '', $par[27]);
                        }
                    }

                    return $data;

                });


            /** @var array $data */
            $data = [];
            foreach ($prices as $price) {
                if (!empty($price)) {
                    $data[] = $price;
                }
            }


            /** @var Values $group */
            $group = !empty($request['group']) ? $request['group'] : 3;
            $countOnGroup = !empty($request['count_on_group']) ? $request['count_on_group'] : 3;

            $output = array_slice($data, 0, $group * $countOnGroup);

            $groupedData = array_chunk($output, $countOnGroup);

            foreach ($groupedData as $key => $data) {

                if (count($data) != $countOnGroup) {
                    unset($groupedData[$key]);
                }
            }
            foreach ($groupedData as $index => $datum) {
                foreach ($datum as $item) {
                    $item['group'] = $index + 1;
                    $command = isset($item['command']) ? $item['command'] : '';
                    $time = isset($item['time']) ? $item['time'] : '';
                    $parsedData = [
                        'group' => $item['group'],
                        'name' => $item['name'],
                        'command' => $command,
                        'time' => $time,
                        'price' => $item['price'],
                        'league' => $item['league'],
                    ];
                    $this->parsedDataRepo->createOrUpdateData($parsedData);
                }
            }
            $groupedData = $this->parsedDataRepo->all();

            return view('parsed-data', compact('groupedData'));

        } catch (\Exception $exception) {
            print_r('Request Failed');
        }

    }

    /**
     * @return \App\Contracts\ParsedData[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getResult()
    {
        return $this->parsedDataRepo->all();
    }

    public function bestResults()
    {
        try {
            $client = new Client();
            $guzzleClient = new GuzzleClient(array(
                'timeout' => 120,
            ));

            ini_set('max_execution_time', 3000);

            $client->setClient($guzzleClient);
            $client->setHeader('Accept', "application/json, text/javascript, */*; q=0.01");
            $client->setHeader('Accept-Encoding', "gzip, deflate, br");
            $client->setHeader('Accept-Language', "ru-RU,ru;q=0.9,en-US;q=0.8,en;q=0.7,hy;q=0.6,nl;q=0.5");
            $client->setHeader('Connection', "keep-alive");
            $client->setHeader('Content-Length', "513");
            $client->setHeader('Content-Type', "application/json");
            $client->setHeader('Cookie', "TopbarBlockedSiteClosed=true; panbet.openeventnameseparately=true; panbet.openadditionalmarketsseparately=false; puid=rBkp8VvUDkgcmhTcLN7RAg==; _ga=GA1.2.1879231597.1540623962; _ym_uid=1540623964288941134; _ym_d=1540623964; _dvp=0:jnr3qaba:GMmBSM8OVP5EjXPWzcVwdM3_njFo_Ccz; fingerprint=b0819bc6751649074463a893948f9f12; __utmz=227551553.1540623969.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); LIVE_TRENDS_STYLE=ARROW; _ga=GA1.3.1879231597.1540623962; _gid=GA1.2.601518368.1541845812; _ym_isad=2; __utma=227551553.1879231597.1540623962.1541845843.1541849402.17; _ym_visorc_24133222=w; SESSION_KEY=2b3502cbff9d4a73b64b1514d8440b11; _dvs=0:jobf5q5g:fXRdeUrzjhTRAzkL0vAD4nXQ3OtHnEwI; last_visit=1541838195878::1541852595878; SyncTimeData={\"offset\":-8519,\"timestamp\":1541853196293}; JSESSIONID=web2~726727BA9E9BBB4B4BBA0CC219BC6FA7; MJSESSIONID=web4~AC09D352942603B321F5B9AA53C7CEDD");
            $client->setHeader('Host', "www.mbetthebookie.win");
            $client->setHeader('Origin', "https://www.mbetthebookie.win");
            $client->setHeader('Referer', "https://www.mbetthebookie.win/su/results.htm");
            $client->setHeader('User-Agent', "Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36");
//            $client->setHeader('X-Requested-With', "XMLHttpRequest");

            $crawler = $client->request('POST', 'https://www.mbetthebookie.win/su/react/results/list');

            dd($crawler);
            $prices = $crawler->filter('button[name="submit"]')->each(

                function ($node) {

                    dump($node->text());

                });

        } catch (\Exception $exception) {
            dd($exception);
            print_r('Request Failed, not connection');

        }

    }
}

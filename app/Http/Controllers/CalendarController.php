<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CalendarController extends Controller
{
    public function index(?string $month = null): View
    {
        if($month == null) {
            $month = date("Y-m");
        }

        $data = $this->calendar($month);
        $fullMonth = $this->fullMonth($data['month']);

        return view('home',[
            'data' => $data,
            'fullMonth' => $fullMonth,
        ]);
    }

    public function calendar($month): array
    {
        $dayLast =  date("Y-m-d", strtotime("last day of ".$month));
        $dayFirst =  date("Y-m-d", strtotime("first day of ".$month));

        // obtener el lunes de la primera semana
        $mondayFirstWeek = mktime(0, 0, 0, date("m", strtotime($dayFirst)),
            date("d", strtotime($dayFirst)), date("Y", strtotime($dayFirst)));

        $newD = $mondayFirstWeek - (date("w", $mondayFirstWeek)*24*3600); //Restar los segundos totales de los dias transcurridos de la semana

        $week1 = date("W",strtotime($dayFirst));
        $week2 = date("W",strtotime($dayLast));

        // semanas totales del mes
        $week = (int)($week2 - $week1) + 1;

        // semana todal del mes
        $dataDate = date("Y-m-d", $newD);

        $calendar = [];

        for($i = 0; $i < $week; $i++) {

            $weekData = [];

            for ($j = 1; $j <= 7; $j++) {
                $dataDate = date("Y-m-d", strtotime($dataDate . "+ 1 day"));
                $dataNew['month'] = date("M", strtotime($dataDate));
                $dataNew['day'] = date("d", strtotime($dataDate));
                $dataNew['date'] = $dataDate;
                $dataNew['event'] = Event::where('date', $dataDate)->get();

                array_push($weekData, $dataNew);
            }
            $dataWeek['week'] = $i;
            $dataWeek['data'] = $weekData;
            array_push($calendar, $dataWeek);
        }

        return [
            'next' => date("Y-M",strtotime($month."+ 1 month")),    //next month
            'month'=> date("M",strtotime($month)),
            'year' => date("Y",strtotime($month)),     // year of the month
            'last' => date("Y-M",strtotime($month."- 1 month")),    //last month
            'calendar' => $calendar,
        ];
    }

    public static function fullMonth($month): string
    {
        switch ($month) {
            case 'Jan':
                $m = trans('calendar.months.jan');
                break;

            case 'Feb':
                $m = trans('calendar.months.feb');
                break;

            case 'Mar':
                $m = trans('calendar.months.mar');
                break;

            case 'Apr':
                $m = trans('calendar.months.apr');
                break;

            case 'May':
                $m = trans('calendar.months.may');
                break;

            case 'Jun':
                $m = trans('calendar.months.jun');
                break;

            case 'Jul':
                $m = trans('calendar.months.jul');
                break;

            case 'Aug':
                $m = trans('calendar.months.aug');
                break;

            case 'Sep':
                $m = trans('calendar.months.sep');
                break;

            case 'Oct':
                $m = trans('calendar.months.oct');
                break;

            case 'Nov':
                $m = trans('calendar.months.nov');
                break;

            case 'Dec':
                $m = trans('calendar.months.dec');
                break;

            default:
                $m = $month;
        }

        return $m;
    }
}

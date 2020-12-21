<?php


namespace App\Controllers\Common\API;


use App\App;
use Core\Api\Response;

class ReviewApiController
{
    public function index(): string
    {
        $response = new Response();
        $reviews = App::$db->getRowsWhere('reviews');

        $rows = $this->buildRows($reviews);

        // Setting "what" to json-encode
        $response->setData($rows);

        // Returns json-encoded response
        return $response->toJson();
    }

    /**
     * Returns formatted time from timestamp given in row.
     *
     * @param $row
     * @return string
     */
    private function timeFormat($row)
    {
        $timeStamp = date('Y-m-d H:i:s', $row['timestamp']);

        $difference = abs(strtotime("now") - strtotime($timeStamp));
        $days = floor($difference / (3600 * 24));
        $hours = floor($difference / 3600);
        $minutes = floor(($difference - ($hours * 3600)) / 60);
        $seconds = floor($difference % 60);

        if ($days) {
            $hours = $hours - 24;
            $result = "{$days}d {$hours}:{$minutes} H";
        } elseif ($minutes) {
            $result = "{$minutes} min";
        } elseif ($hours) {
            $result = "{$hours}:{$minutes} H";
        } else {
            $result = "{$seconds} sec";
        }

        return $result;
    }

    /**
     * Formats rows from given @param (in this case - orders data)
     * Intended use is for setting data in json.
     *
     * @param $reviews
     * @return mixed
     */
    private function buildRows($reviews)
    {
        foreach ($reviews as $id => &$row) {
            $row = [
                'id' => $id,
                'name' => $row['name'],
                'comment' => $row['comment'],
                'timestamp' => $this->timeFormat($row)
            ];
        }

        return $reviews;
    }
}

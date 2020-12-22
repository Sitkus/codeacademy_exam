<?php

namespace App\Controllers\User\API;

use App\App;
use App\Controllers\Base\API\AuthController;
use App\Views\Forms\Review\ReviewCreateForm;
use Core\Api\Response;

class ReviewApiController extends AuthController {
    public function create(): string {

        // This is a helper class to make sure
        // we use the same API json response structure
        $response = new Response();
        $form = new ReviewCreateForm();

        if ($form->validate()) {
            $user = App::$session->getUser();

            $reviews = $form->values();
            $reviews['id'] = App::$db->insertRow('reviews', $form->values() + [
                    'name'      => $user['firstname'],
                    'timestamp' => time()
                ]);

            $reviews = $this->buildRow($user, $reviews);
            $response->setData($reviews);
        } else {
            $response->setErrors($form->getErrors());
        }

        // Returns json-encoded response
        return $response->toJson();
    }

    /**
     * Formats row for json to be used in update method,
     * so that the data would be updated in the same format.
     *
     * @param $user
     * @param $review
     * @return array
     */
    private function buildRow($user, $review): array {
        return $row = [
            'id' => $review['id'],
            'name' => $user['firstname'],
            'comment' => $review['comment'],
            'timestamp' => $this->timeFormat(time())
        ];
    }

    /**
     * Returns formatted time from timestamp given in row.
     *
     * @param $time
     * @return string
     */
    private function timeFormat($time) {
        $timeStamp = date('Y-m-d H:i:s', $time);
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
}

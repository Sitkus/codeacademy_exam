<?php

namespace App\Controllers\Common\API;

use App\App;
use Core\API\Response;

class ReviewApiController {
    public function index(): string {
        $response = new Response();
        $reviews = App::$db->getRowsWhere('reviews');

        $rows = $this->buildRows($reviews);

        // Setting "what" to json-encode
        $response->setData($rows);

        // Returns json-encoded response
        return $response->toJson();
    }

    /**
     * Formats rows from given @param (in this case - orders data)
     * Intended use is for setting data in json.
     *
     * @param $reviews
     * @return mixed
     */
    private function buildRows($reviews) {
        foreach ($reviews as $id => &$row) {
            $row = [
                'id' => $id,
                'name' => $row['name'],
                'comment' => $row['comment'],
                'timestamp' => $row['time']
            ];
        }

        return $reviews;
    }
}

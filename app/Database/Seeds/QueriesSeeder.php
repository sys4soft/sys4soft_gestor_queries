<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class QueriesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_user' => 1,
                'query_name' => 'Query 1',
                'query_tags' => 'tag1, tag2, tag3',
                'project' => 'Project 1',
                'query' => 'SELECT * FROM table1',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_user' => 1,
                'query_name' => 'Query 2',
                'query_tags' => 'tag1, tag2, tag3',
                'project' => 'Project 1',
                'query' => 'SELECT * FROM table2',
                'created_at' => date('Y-m-d H:i:s')
            ]
        ];

        foreach ($data as $query) {
            $params = [
                $query['id_user'],
                $query['query_name'],
                $query['query_tags'],
                $query['project'],
                $query['query']
            ];

            $this->db->query("
                INSERT INTO queries(id_user, query_name, query_tags, project, query, created_at)
                VALUES 
                (
                    ?, 
                    ?, 
                    ?, 
                    ?, 
                    AES_ENCRYPT(?,'" . MYSQL_AES_KEY . "'),
                    NOW()
                )", $params);
        }
    }
}

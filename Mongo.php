<?php

/**
 * Created by PhpStorm.
 * User: Dylan.L
 * Date: 2019/5/26
 * Time: 11:01
 */
class MongoDao
{
    public $manager;
    public $dbName;
    public $tableName;

    public function __construct($config)
    {
        $uri = 'mongodb://' . ($config['username'] ? "{$config['username']}" : '') . ($config['password'] ? ":{$config['password']}@" : '') . $config['host'] . ($config['port'] ? ":{$config['port']}" : '') . '/' . ($config['database'] ? "{$config['database']}" : '');
        $this->manager = new MongoDB\Driver\Manager($uri);
        $this->dbName = $config['database'];
        $this->tableName = 'tecent_news';

    }

    /**获取最新的新闻
     * @param array $category 新闻种类，数组
     * @param $limit
     * @param $offset
     * @return array 返回查询结果
     */
    public function getNews(array $category, $count, $offset)
    {
        $yestoday_time=strtotime(date("Y-m-d",strtotime("-1 day")));
        $filter = ['category_chn' => ['$in' => $category],'publish_time'=>['$gt'=>$yestoday_time]];
        $options = ['projection' => ['_id' => 0, 'article_id' => 1,'view_count'=>1, 'category' => 1, 'category_chn'=>1, 'publish_time' => 1, 'img' => 1, 'tags' => 1, 'title' => 1, 'intro' => 1],
            'sort' => ['publish_time' => -1],
            'limit' => $count,
            'skip' => $offset
        ];
        $query = new \MongoDB\Driver\Query($filter, $options);
        $result = $this->manager->executeQuery($this->dbName . "." . $this->tableName, $query);
        return json_decode(json_encode($result->toArray()), true);

    }
    public function getHotNews($category, $count){
        if (is_array($category)){
            $yestoday_time=strtotime(date("Y-m-d",strtotime("-1 day")));
            $filter = ['category_chn' => ['$in' => $category],'publish_time'=>['$gt'=>$yestoday_time]];
            $options = ['projection' => ['_id' => 0, 'article_id' => 1,'view_count'=>1, 'category' => 1, 'category_chn'=>1, 'publish_time' => 1, 'img' => 1, 'tags' => 1, 'title' => 1, 'intro' => 1],
                'sort' => ['view_count' => -1],
                'limit' => $count,
                'skip' => 0
            ];
        }else{
            $filter = ['category_chn' => $category];
            $options = ['projection' => ['_id' => 0, 'article_id' => 1,'view_count'=>1, 'category' => 1, 'category_chn'=>1, 'publish_time' => 1, 'img' => 1, 'tags' => 1, 'title' => 1, 'intro' => 1],
                'sort' => ['view_count' => -1],
                'limit' => $count,
                'skip' => 0
            ];
        }
        $query = new \MongoDB\Driver\Query($filter, $options);
        $result = $this->manager->executeQuery($this->dbName . "." . $this->tableName, $query);
        return json_decode(json_encode($result->toArray()), true);
    }
    public function getNewsById($id)
    {
        if (strpos($id, "$") !== false || strpos($id, "}") !== false || strpos($id, "\"") !== false || strpos($id, "'") !== false) {
            error_log("存在注入{$id}", 2, "error.log");
            return [];
        }
        $filter = ['article_id' => $id];
        $options = ['projection' => ['_id' => 0, 'article_id' => 1,'view_count'=>1, 'category' => 1, 'category_chn' => 1, 'publish_time' => 1, 'source' => 1, 'keywords' => 1, 'title' => 1, 'tags' => 1, 'intro' => 1, 'content' => 1],
            'limit' => 1];
        $query = new \MongoDB\Driver\Query($filter, $options);

        $result = $this->manager->executeQuery($this->dbName . "." . $this->tableName, $query);
        return json_decode(json_encode($result->toArray()[0]), true);


    }

    public function getRecommandNews($category)
    {
        if (strpos($category, "$") !== false || strpos($category, "}") !== false || strpos($category, "\"") !== false || strpos($category, "'") !== false) {
            error_log("存在注入{$category}", 2, "error.log");
            return [];
        }
        $filter = ['category_chn' => $category];
        $options = ['projection' => ['_id' => 0, 'article_id' => 1, 'title' => 1, 'tags' => 1],
            'skip' => 0,
            'limit' => 15];
        $query = new \MongoDB\Driver\Query($filter, $options);
        $result = $this->manager->executeQuery($this->dbName . "." . $this->tableName, $query);

        return json_decode(json_encode($result->toArray()), true);

    }

    public function getRelateNews(array $tags)
    {
        $or = [];
        foreach ($tags as $tag) {
            $or[]['tags'] = $tag;
        }
        $filter = ['$or' => $or];
        $options = [
            'projection' => ['_id' => 0, 'article_id' => 1, 'category' => 1, 'publish_time' => 1, 'img' => 1, 'tags' => 1, 'title' => 1, 'intro' => 1],
            'skip' => 0,
            'limit' => 20,
            'sort' => ['publish_time' => -1]
        ];
        $query = new \MongoDB\Driver\Query($filter, $options);
        $result = $this->manager->executeQuery($this->dbName . "." . $this->tableName, $query);
        return json_decode(json_encode($result->toArray()), true);

    }

    public function getNewsByCategory($category, $page, $limit)
    {
        if (strpos($category, "$") !== false || strpos($category, "}") !== false || strpos($category, "\"") !== false || strpos($category, "'") !== false) {
            error_log("存在注入{$category}", 2, "error.log");
            return [];
        }
        $filter = ['category_chn' => $category];
        $options = ['projection' => ['_id' => 0, 'article_id' => 1,"img"=>1,"view_count"=>1, 'category' => 1, 'category_chn' => 1, 'publish_time' => 1, 'source' => 1, 'keywords' => 1, 'title' => 1, 'tags' => 1, 'intro' => 1],
            'skip' => ($page - 1) * $limit,
            'limit' => $limit,
            'sort' => ['publish_time' => -1]];
        $query = new \MongoDB\Driver\Query($filter, $options);
        $result = $this->manager->executeQuery($this->dbName . "." . $this->tableName, $query);
        return json_decode(json_encode($result->toArray()), true);
    }

    public function getCategoryCount($category)
    {
        if (strpos($category, "$") !== false || strpos($category, "}") !== false || strpos($category, "\"") !== false || strpos($category, "'") !== false) {
            error_log("存在注入{$category}", 2, "error.log");
            return [];
        }
        $cmd = [
            'count' => "tecent_news",
            'query' => ['category_chn' => $category]
        ];
        $cmd = new \MongoDB\Driver\Command($cmd);
        $result = $this->manager->executeCommand($this->dbName, $cmd);
        return $result->toArray()[0]->n;
    }

    public function getNewsByTag($tag)
    {
        if (strpos($tag, "$") !== false || strpos($tag, "}") !== false || strpos($tag, "\"") !== false || strpos($tag, "'") !== false) {
            error_log("存在注入{$tag}", 2, "error.log");
            return [];
        }


        $filter = ['tags' => $tag];
        $options = ['projection' => ['_id' => 0, 'article_id' => 1,'img'=>1,'view_count'=>1, 'category' => 1, 'category_chn' => 1, 'publish_time' => 1, 'source' => 1, 'keywords' => 1, 'title' => 1, 'tags' => 1, 'intro' => 1],
            'sort' => ['publish_time' => -1],
            'limit' => 20,
            'skip' => 0];
        $query = new \MongoDB\Driver\Query($filter, $options);
        $result = $this->manager->executeQuery($this->dbName . "." . $this->tableName, $query);

        return json_decode(json_encode($result->toArray()), true);

    }

    public function getNewsByKeyword($keyword,$article_id)
    {
        if (strpos($keyword, "$") !== false || strpos($keyword, "}") !== false || strpos($keyword, "\"") !== false || strpos($keyword, "'") !== false) {
            error_log("存在注入{$keyword}", 2, "error.log");
            return [];
        }
        $filter = ['keywords' => $keyword,'article_id'=>['$ne'=>$article_id]];
        $options = ['projection' => ['_id' => 0, 'article_id' => 1],
            'sort' => ['publish_time' => -1],
            'limit' => 1,
            'skip' => 0];
        $query = new \MongoDB\Driver\Query($filter, $options);
        $result = $this->manager->executeQuery($this->dbName . "." . $this->tableName, $query);
        $result=$result->toArray();
        if (count($result)>0){
            return json_decode(json_encode($result[0]), true);
        }else{
            return [];
        }
    }

    public function Insert($data)
    {
        $bulkWrite = new \MongoDB\Driver\BulkWrite();
        $bulkWrite->insert($data);
        $writeConcern = new \MongoDB\Driver\WriteConcern(\MongoDB\Driver\WriteConcern::MAJORITY, 1000);
        $this->manager->executeBulkWrite($this->dbName . "." . $this->tableName, $bulkWrite, $writeConcern);
    }

public function update($content){
    $bulkWrite = new \MongoDB\Driver\BulkWrite();
    $filter=["article_id"=>"20190603A0L9QB"];
    $obj=['$set' => ['content' => $content]];
    $bulkWrite->update($filter,$obj);
    $writeConcern = new \MongoDB\Driver\WriteConcern(\MongoDB\Driver\WriteConcern::MAJORITY, 1000);
    $this->manager->executeBulkWrite($this->dbName . "." . $this->tableName, $bulkWrite, $writeConcern);

}
}
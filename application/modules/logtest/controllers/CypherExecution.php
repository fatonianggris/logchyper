<?php

use Everyman\Neo4j\Client,
    Everyman\Neo4j\Index\NodeIndex,
    Everyman\Neo4j\Relationship,
    Everyman\Neo4j\Node,
    Everyman\Neo4j\Traversal,
    Everyman\Neo4j\Cypher,
    Everyman\Neo4j\Cypher\Query;

class CypherExecution extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->client = new Client('127.0.0.1', 7474);
        $this->client->getTransport()
                ->setAuth('neo4j', '123456');
    }

    public function initiate_server() {
        $result = $this->client->getServerInfo();
        if ($result) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('Error' => 'Failed.'));
        }
    }

    public function pp1() {
        $process = 'PP1';
        $this->activity_A($process);
        $this->activity_B($process);
        $this->activity_C($process);
        $this->activity_D($process);
        $this->activity_F($process);
        $this->activity_G($process);
        $this->activity_I($process);
    }

    public function pp2() {
        $process = 'PP2';
        $this->activity_A($process);
        $this->activity_B($process);
        $this->activity_C($process);
        $this->activity_E($process);
        $this->activity_F($process);
        $this->activity_H($process);
        $this->activity_I($process);
    }

    public function pp3() {
        $process = 'PP3';
        $this->activity_A($process);
        $this->activity_B($process);
        $this->activity_C($process);
        $this->activity_B($process);
        $this->activity_C($process);
        $this->activity_D($process);
        $this->activity_F($process);
        $this->activity_G($process);
        $this->activity_I($process);
    }

    public function pp4() {
        $process = 'PP4';
        $this->activity_A($process);
        $this->activity_B($process);
        $this->activity_C($process);
        $this->activity_B($process);
        $this->activity_C($process);
        $this->activity_E($process);
        $this->activity_F($process);
        $this->activity_H($process);
        $this->activity_I($process);
    }

    public function pp5() {
        $process = 'PP5';
        $this->activity_A($process);
        $this->activity_I($process);
    }

    public function pp6() {
        $process = 'PP6';
        $this->activity_A($process);
        $this->activity_B($process);
        $this->activity_C($process);
        $this->activity_F($process);
        $this->activity_G($process);
        $this->activity_I($process);
    }

    public function pp7() {
        $process = 'PP7';
        $this->activity_A($process);
        $this->activity_B($process);
        $this->activity_C($process);
        $this->activity_D($process);
        $this->activity_F($process);
        $this->activity_I($process);
    }

    public function pp8() {
        $process = 'PP8';
        $this->activity_A($process);
        $this->activity_B($process);
        $this->activity_C($process);
        $this->activity_D($process);
        $this->activity_D($process);
        $this->activity_F($process);
        $this->activity_H($process);
        $this->activity_I($process);
    }

    public function pp9() {
        $process = 'PP9';
        $this->activity_A($process);
        $this->activity_I($process);
    }

    public function pp10() {
        $process = 'PP10';
        $this->activity_A($process);
        $this->activity_I($process);
    }

    public function activity_A($process) {
        $now = new DateTime();
        $timestring = $now->format('d/m/Y h:i:s A');
        $this->create_node($process, 'A', $timestring);
        //print_r($timestring);exit;
        $this->merge_activity();
    }

    public function activity_B($process) {
        $now = new DateTime();
        $timestring = $now->format('d/m/Y h:i:s A');
        $this->create_node($process, 'B', $timestring);
        //print_r($timestring);exit;
        $this->merge_activity();
    }

    public function activity_C($process) {
        $now = new DateTime();
        $timestring = $now->format('d/m/Y h:i:s A');
        $this->create_node($process, 'C', $timestring);
        //print_r($timestring);exit;
        $this->merge_activity();
    }

    public function activity_D($process) {
        $now = new DateTime();
        $timestring = $now->format('d/m/Y h:i:s A');
        $this->create_node($process, 'D', $timestring);
        //print_r($timestring);exit;
        $this->merge_activity();
    }

    public function activity_E($process) {
        $now = new DateTime();
        $timestring = $now->format('d/m/Y h:i:s A');
        $this->create_node($process, 'E', $timestring);
        //print_r($timestring);exit;
        $this->merge_activity();
    }

    public function activity_F($process) {
        $now = new DateTime();
        $timestring = $now->format('d/m/Y h:i:s A');
        $this->create_node($process, 'F', $timestring);
        //print_r($timestring);exit;
        $this->merge_activity();
    }

    public function activity_G($process) {
        $now = new DateTime();
        $timestring = $now->format('d/m/Y h:i:s A');
        $this->create_node($process, 'G', $timestring);
        //print_r($timestring);exit;
        $this->merge_activity();
    }

    public function activity_H($process) {
        $now = new DateTime();
        $timestring = $now->format('d/m/Y h:i:s A');
        $this->create_node($process, 'H', $timestring);
        //print_r($timestring);exit;
        $this->merge_activity();
    }

    public function activity_I($process) {
        $now = new DateTime();
        $timestring = $now->format('d/m/Y h:i:s A');
        $this->create_node($process, 'I', $timestring);
        //print_r($timestring);exit;
        $this->merge_activity();
    }

    public function create_node($node, $activity, $start_time) {
        $queryString = "CREATE (:Activity {
					CaseId:'$node', 
					Name:'$activity', 
					StartTime:'$start_time'
				})";
        $query = new Everyman\Neo4j\Cypher\Query($this->client, $queryString);
        $result = $query->getResultSet();
        if ($result) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('Error' => 'Failed.'));
        }
    }

    public function merge_activity() {
        $queryString = "MATCH (n:Activity) 
                        MERGE (:CaseActivity {Name:n.Name})";

        $query = new Everyman\Neo4j\Cypher\Query($this->client, $queryString);
        $result = $query->getResultSet();
        if ($result) {
            $this->sequence();
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('Error' => 'Failed.'));
        }
    }

    public function sequence() {
        $this->del_xorsplitjoin();
        $this->del_andsplitjoin();
        $this->del_orsplitjoin();
        $this->del_nonfreechoice();
        $this->del_squence();
        $queryString = "MATCH (c:Activity)
                        with collect(c) AS Caselist
                        unwind range(0,Size(Caselist) - 2) AS array
                        with Caselist[array] AS list1,
                        Caselist[array+1] AS list2
                        match (b:CaseActivity),(a:CaseActivity)
                        where list1.CaseId = list2.CaseId
                        AND list1.Name = a.Name
                        AND list2.Name = b.Name
                        CREATE (a)-[:NEXT {
                        relation:'NEXT'			
                            }]−>(b)";
        $query = new Everyman\Neo4j\Cypher\Query($this->client, $queryString);
        $result = $query->getResultSet();
        if ($result) {
            $this->count_weight();
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('Error' => 'Failed.'));
        }
    }

    public function del_squence() {
        $queryString = "MATCH p=()-[r:NEXT]->() DELETE r";
        $query = new Everyman\Neo4j\Cypher\Query($this->client, $queryString);
        $result = $query->getResultSet();
        if ($result) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('Error' => 'Failed.'));
        }
    }

    public function count_weight() {
        $queryString = "MATCH (x)-[z:NEXT]−>(y)
                        WHERE size((x)−−>(y))> 0 
                        WITH size((x)−−>(y)) as rel_by_node,size((x)−−>()) as rel_all,x,y, z
                        CREATE UNIQUE (x)-[:NEXT{Weight:toFloat(rel_by_node)/toFloat(rel_all)}]->(y)
                        DETACH delete z";
        $query = new Everyman\Neo4j\Cypher\Query($this->client, $queryString);
        $result = $query->getResultSet();
        if ($result) {
            $this->count_fuzzy();
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('Error' => 'Failed.'));
        }
    }

    public function count_fuzzy() {
        $queryString = "MATCH (a)-[r:NEXT]->(b) 
                        WITH avg(r.Weight) as avg, stDev(r.Weight) as std
                        WITH avg-std as med_bot, avg+std as med_top
                        MATCH (x)-[z:NEXT]−>(y)
                        WITH z,x,y,CASE 
                        WHEN z.Weight < med_bot THEN
                                'LOW'
                        WHEN z.Weight >= med_bot AND z.Weight <= med_top THEN
                                'MEDIUM'
                        WHEN z.Weight > med_top THEN
                                'HIGH'
                        END AS level
                        create (x)-[:NEXT{Weight:z.Weight,Fuzzy:level}]−>(y)
                        detach delete z";
        $query = new Everyman\Neo4j\Cypher\Query($this->client, $queryString);
        $result = $query->getResultSet();
        if ($result) {
            $this->invisible_task();
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('Error' => 'Failed.'));
        }
    }

    public function invisible_task() {
        $this->del_invtask();
        $queryString = "MATCH (n)-[r:NEXT]−>(a)
                        WHERE size ((n)−−>())>1
                        AND size ((a)<−−())>1
                        CREATE (i:invisibletask {Name:'invisible_task'})
                        CREATE (n)-[o:NEXT{Weight:r.Weight,Fuzzy:r.Fuzzy}]−>(i)
                        CREATE (i)-[:NEXT{Weight:o.Weight,Fuzzy:o.Fuzzy}]−>(a)
                        DELETE r";
        $query = new Everyman\Neo4j\Cypher\Query($this->client, $queryString);
        $result = $query->getResultSet();
        if ($result) {
            $this->xorsplit_xorjoin();
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('Error' => 'Failed.'));
        }
    }

    public function del_invtask() {
        $queryString = "MATCH (n:invisibletask) delete n";
        $query = new Everyman\Neo4j\Cypher\Query($this->client, $queryString);
        $result = $query->getResultSet();
        if ($result) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('Error' => 'Failed.'));
        }
    }

    public function xorsplit_xorjoin() {

        $queryString1 = "MATCH (x)-[z:NEXT]−>(y)
                         WHERE size((x)−−>()) > 1
                         AND (size((y)<−−()) = 1)
                         CREATE (x)-[:XORSPLIT{Weight:z.Weight,Fuzzy:z.Fuzzy}]−>(y)
                         DETACH DELETE z";
        $query1 = new Everyman\Neo4j\Cypher\Query($this->client, $queryString1);
        $result1 = $query1->getResultSet();
        $queryString2 = "MATCH (x)-[z:NEXT]−>(y)
                         WHERE size((x)−−>()) = 1
                         AND (size((y)<−−()) > 1 )
                         CREATE (x)-[:XORJOIN{Weight:z.Weight,Fuzzy:z.Fuzzy}]−>(y)
                         DETACH DELETE z";
        $query2 = new Everyman\Neo4j\Cypher\Query($this->client, $queryString2);
        $result2 = $query2->getResultSet();
        if ($result1 && $result2) {
            $this->andsplit_andjoin();
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('Error' => 'Failed.'));
        }
    }

    public function del_xorsplitjoin() {

        $queryString1 = "MATCH p=()-[r:XORSPLIT]->() DELETE r";
        $query1 = new Everyman\Neo4j\Cypher\Query($this->client, $queryString1);
        $result1 = $query1->getResultSet();

        $queryString2 = "MATCH p=()-[r:XORJOIN]->() DELETE r";
        $query2 = new Everyman\Neo4j\Cypher\Query($this->client, $queryString2);
        $result2 = $query2->getResultSet();

        if ($result1 && $result2) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('Error' => 'Failed.'));
        }
    }

    public function andsplit_andjoin() {

        $queryString1 = "MATCH (x)-[z:NEXT]−>(y)
                         WHERE (size((x)−−>()) = 1)
                         AND (size((y)−−>()) > 2 )
                         CREATE (x)-[:ANDSPLIT{Weight:z.Weight,Fuzzy:z.Fuzzy}]−>(y)
                         DETACH delete z";
        $query1 = new Everyman\Neo4j\Cypher\Query($this->client, $queryString1);
        $result1 = $query1->getResultSet();
        $queryString2 = "MATCH (x)-[z:NEXT]−>(y)<−[r:NEXT]-(c)
                         WHERE size((y)<−−())>1 
                         AND size((c)−−>())= size((y)<−−())
                         MERGE (x)-[:ANDJOIN{Weight:z.Weight,Fuzzy:z.Fuzzy}]−>(y)<−[:ANDJOIN{Weight:r.Weight,Fuzzy:r.Fuzzy}]-(c)
                         DELETE z";
        $query2 = new Everyman\Neo4j\Cypher\Query($this->client, $queryString2);
        $result2 = $query2->getResultSet();
        if ($result1 && $result2) {
            $this->orsplit_orjoin();
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('Error' => 'Failed.'));
        }
    }

    public function del_andsplitjoin() {

        $queryString1 = "MATCH p=()-[r:ANDSPLIT]->() DELETE r";
        $query1 = new Everyman\Neo4j\Cypher\Query($this->client, $queryString1);
        $result1 = $query1->getResultSet();

        $queryString2 = "MATCH p=()-[r:ANDJOIN]->() DELETE r";
        $query2 = new Everyman\Neo4j\Cypher\Query($this->client, $queryString2);
        $result2 = $query2->getResultSet();

        if ($result1 && $result2) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('Error' => 'Failed.'));
        }
    }

    public function orsplit_orjoin() {

        $queryString1 = "MATCH (x)-[z:NEXT]−>(y)
                         WHERE size((x)−−>()) > 1
                         AND (size((y)−−>()) >= 3)
                         CREATE (x)-[:ORSPLIT{Weight:z.Weight,Fuzzy:z.Fuzzy}]−>(y)
                         DETACH delete z";
        $query1 = new Everyman\Neo4j\Cypher\Query($this->client, $queryString1);
        $result1 = $query1->getResultSet();
        $queryString2 = "MATCH (x)-[z:NEXT]−>(y)<−[r:NEXT]-(c)
                         WHERE size((y)<−−())>1 and size((c)−−>())= size((y)<−−())
                         MERGE (x)-[:ORJOIN{Weight:z.Weight,Fuzzy:z.Fuzzy}]−>(y)<−[:ORJOIN{Weight:r.Weight,Fuzzy:r.Fuzzy}]-(c)
                         DELETE z";
        $query2 = new Everyman\Neo4j\Cypher\Query($this->client, $queryString2);
        $result2 = $query2->getResultSet();
        if ($result1 && $result2) {
            $this->nonfreechoice();
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('Error' => 'Failed.'));
        }
    }

    public function del_orsplitjoin() {

        $queryString1 = "MATCH p=()-[r:ORSPLIT]->() DELETE r";
        $query1 = new Everyman\Neo4j\Cypher\Query($this->client, $queryString1);
        $result1 = $query1->getResultSet();

        $queryString2 = "MATCH p=()-[r:ORJOIN]->() DELETE r";
        $query2 = new Everyman\Neo4j\Cypher\Query($this->client, $queryString2);
        $result2 = $query2->getResultSet();

        if ($result1 && $result2) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('Error' => 'Failed.'));
        }
    }

    public function nonfreechoice() {

        $queryString = "match p=(x)-[:XORJOIN]−>()
                        match q=()-[:XORSPLIT]−>(y)
                        match (a:Activity),(b:Activity)
                        where x.Name=a.Name and y.Name=b.Name
                        and a.CaseId=b.CaseId
                        and a.StartTime < b.StartTime
                        merge (x)-[:NONFREECHOICE{Weight:1,Fuzzy:'HIGH'}]−>(y)";
        $query = new Everyman\Neo4j\Cypher\Query($this->client, $queryString);
        $result = $query->getResultSet();
        if ($result) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('Error' => 'Failed.'));
        }
    }

    public function del_nonfreechoice() {
        $queryString = "MATCH p=()-[r:NONFREECHOICE]->() DELETE r";
        $query = new Everyman\Neo4j\Cypher\Query($this->client, $queryString);
        $result = $query->getResultSet();
        if ($result) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('Error' => 'Failed.'));
        }
    }

}

?>

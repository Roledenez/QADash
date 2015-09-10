    <?php

    /*
     * Auther : Roledene
     * Type : class
     * Name : Project_m
     * Description : this class represent the project table in db and it's functionality
     */

    class Project_m extends My_Model {

        // table name of the database
        protected $_table_name = "project";
        // order by clouse
        protected $_order_by = "";
        protected $_timestamps = FALSE;
        // output data holder
        public $data = array();

        // constructor
        public function __construct() {
            parent::__construct();
        }

        /*
         * Auther : Roledene
         * Type : method
         * Name : getAllProjects
         * Description : this method return all the project tuples in project table
         */

        public function getAllProjects() {
            $project = $this->get();
            if (count($project)) {// if project found
                //var_dump($project);
                $data = null;
                $i = 0;
                while (count($project) > $i) {
                    $data[$i] = array(
                        'pid' => $project[$i]->project_id,
                        'name' => $project[$i]->name,
                        'description' => $project[$i]->description,
                        'startingDate' => $project[$i]->starting_date,
                        'endingDate' => $project[$i]->ending_date,
                        'status' => $project[$i]->status,
                        'prorityId' => $project[$i]->prority_id
                    );
                    $i++;
                }
                return $data;
            } else { // if there wasn't any projects
                #TODO
                #print an error message
                return null;
            }
        }

        /*
         * Auther : Roledene
         * Type : method
         * Name : getFinishedProjects
         * Description : this method return all the project tuples in project table
         */

        public function getFinishedProjects() {
            $project = $this->get();
            if (count($project)) {// if project found
                // var_dump($project);
                $data = null;
                $i = 0;
                while (count($project) > $i) {
                    $data[$i] = array(
                        'pid' => $project[$i]->project_id,
                        'name' => $project[$i]->name,
                        'description' => $project[$i]->description,
                        'startingDate' => $project[$i]->starting_date,
                        'endingDate' => $project[$i]->ending_date,
                        'status' => $project[$i]->status,
                        'prorityId' => $project[$i]->prority_id
                    );
                    $i++;
                }
                return $data;
            } else { // if there wasn't any projects
                #TODO
                #print an error message
                return null;
            }
        }

        function getAllProjectsID() {
            $this->load->database();
            $sql = ('select * from project');
            $query = $this->db->query($sql);

            foreach ($query->result_array() as $row) {
                $data[$row['project_id']] = $row['name'];
            }
            return $data;
        }
        
        public function getProjectsSprintDet($pid) {

         $query = "SELECT * from project_sprint where project_id= $pid";
         $result = $this->db->query($query);
         return $result->result();
        }

        function getProjectName($pid) {
        $this->db->select('name');
        $this->db->from('project');
        $this->db->where('project_id',$pid);
        $query = $this->db->get();
        $x = $query->result();
        return $x[0]->name;
    }

    function getFailedTestcases($pid) {
        $queryTC = "SELECT COUNT(tc.testcase_id) as FailedTC
                    from project p, testsuites ts, testcase tc
                    WHERE p.project_id=ts.project_id and ts.testsuites_id=tc.testsuites_id and p.project_id=$pid and tc.status = 'failed'";

        $result = $this->db->query($queryTC);
        $x = $result->result();
        return $x[0]->FailedTC;
    }

    function getPassedTestcases($pid) {
        $queryTC = "SELECT COUNT(tc.testcase_id) as PassedTC
                    from project p, testsuites ts, testcase tc
                    WHERE p.project_id=ts.project_id and ts.testsuites_id=tc.testsuites_id and p.project_id=$pid and tc.status = 'passed'";

        $result = $this->db->query($queryTC);
        $x = $result->result();
        return $x[0]->PassedTC;
    }
    
    function getInProgressTestcases($pid) {
        $queryTC = "SELECT COUNT(tc.testcase_id) as InProgressTC
                    from project p, testsuites ts, testcase tc
                    WHERE p.project_id=ts.project_id and ts.testsuites_id=tc.testsuites_id and p.project_id=$pid and tc.status = 'in progress'";

        $result = $this->db->query($queryTC);
        $x = $result->result();
        return $x[0]->InProgressTC;
    }
    
    function get_columnchartdata() {
        $this->db->select('Pname, totalhours, spentours');
        $this->db->from('charts');
        $query = $this->db->get();
        return $query->result();
    }
    
    function getFailedTestcasesDetails($pid) {
        $queryFTC = "SELECT p.name as pname, ts.name testsuiteName,tc.testcase_id as tid, tc.description as testcase, pr.priority_id as priority,pr.name as prname, ts.name as testSuit from project p, testsuites ts, testcase tc, priority pr
                    WHERE p.project_id=ts.project_id and ts.testsuites_id=tc.testsuites_id and tc.prority_id=pr.priority_id and p.project_id=$pid and tc.status = 'failed' ORDER BY pr.priority_id, ts.testsuites_id ";

        $result = $this->db->query($queryFTC);
        $x = $result->result();
        //print_r('query = '.$x[0]->pname);
        return $result->result();
    }
    

}


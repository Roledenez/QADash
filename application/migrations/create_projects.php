<?php

// defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Projects extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '500',
                        ),
                        'starting_date' => array(
                                'type' => 'date',
                        ),
                        'ending_date' => array(
                                'type' => 'date',
                        ),
                        'staus' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '500',
                        ),
                        'description' => array(
                                'type' => 'TEXT',
                                'null' => TRUE,
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('Projects');
        }

        public function down()
        {
                $this->dbforge->drop_table('Projects');
        }
}
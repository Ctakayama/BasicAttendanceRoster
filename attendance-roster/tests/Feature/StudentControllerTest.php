<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentControllerTest extends TestCase
{
    /**
     * A test for the /students endpoint. Should return 200 when successful
     *
     * @return void
     */
    public function test_good_index_route()
    {
        //correct uri
        $response = $this->get('api/students');
        $response   
            ->assertStatus(200)
            ->assertJson([['first_name'=> 'Chadwick'], ['first_name'=> 'Evelyn']]);
    }

    /**
     * A test for the incorrect endpoint. Should return 404 for not found
     *
     * @return void
     */
    public function test_bad_index_route()
    {
        //incorrect uri
        $response = $this->get('api/students/1234');
        $response->assertStatus(404);
    }


    /**
     * Test to check if update appropriately modifies an entry in the DB.
     * first PUT request should set is_present to true,
     * second PUT request should set is_present to false.
     *
     * @return void
     */
    public function test_update_an_id_that_does_exist()
    {

        $presentContent = '{
            "student": {
                "is_present": true
            }
        }';

        $absentContent = '{
            "student": {
                "is_present": false
            }
        }';
        
        // valid student id in database
        $response = $this->put('api/student/1651092040799', json_decode($presentContent, true));
        $response
            ->assertStatus(200)
            ->assertJson(['first_name'=> 'Chadwick', 'is_present'=> '1']);

        $response = $this->put('api/student/1651092040799', json_decode($absentContent, true));
        $response
            ->assertStatus(200)
            ->assertJson(['first_name'=> 'Chadwick', 'is_present'=> '0']);

    }

    /**
     * A test for the /student/{student_id} endpoint. Should return 200 when successful
     *
     * @return void
     */
    public function test_update_an_id_that_does_not_exist()
    {
        // fake student id
        $response = $this->put('api/student/23456789');
        $response->assertStatus(200)->assertJson(['success'=> 'Status change failed.']);

    }

}

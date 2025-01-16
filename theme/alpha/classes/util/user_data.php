<?php
namespace theme_alpha\util;

class user_data {
    public static function get_users_list($page = 0, $perpage = 10, $search = '', $sort = 'id', $direction = 'ASC') {
        global $DB;

        // Define allowed sort columns
        $allowedSorts = ['id', 'firstname', 'lastname', 'username', 'email', 'city'];
        if (!in_array($sort, $allowedSorts)) {
            $sort = 'id'; // Default sort by ID
        }

        // Validate sort direction
        $direction = strtoupper($direction) === 'DESC' ? 'DESC' : 'ASC';

        $sql = "SELECT u.id, u.firstname, u.lastname, u.username, u.email, u.phone1, u.city
                FROM {user} u
                WHERE u.deleted = 0 AND u.suspended = 0";
        
        $params = array();
        
        if (!empty($search)) {
            $sql .= " AND (
                u.firstname LIKE :search1 OR 
                u.lastname LIKE :search2 OR 
                u.email LIKE :search3 OR 
                u.username LIKE :search4
            )";
            $searchterm = '%' . $search . '%';
            $params['search1'] = $searchterm;
            $params['search2'] = $searchterm;
            $params['search3'] = $searchterm;
            $params['search4'] = $searchterm;
        }

        $total = $DB->count_records_sql("SELECT COUNT(1) FROM ($sql) temp", $params);
        
        // Add sorting - ID is now the default
        switch($sort) {
            case 'id':
                $sql .= " ORDER BY u.id $direction";
                break;
            case 'firstname':
                $sql .= " ORDER BY u.firstname $direction, u.id ASC";
                break;
            case 'lastname':
                $sql .= " ORDER BY u.lastname $direction, u.id ASC";
                break;
            case 'username':
                $sql .= " ORDER BY u.username $direction, u.id ASC";
                break;
            case 'email':
                $sql .= " ORDER BY u.email $direction, u.id ASC";
                break;
            case 'city':
                $sql .= " ORDER BY u.city $direction, u.id ASC";
                break;
            default:
                $sql .= " ORDER BY u.id ASC"; // Default to ID ascending
        }
        
        $sql .= " LIMIT $perpage OFFSET " . ($page * $perpage);
        
        $users = $DB->get_records_sql($sql, $params);
        
        $result = array();
        foreach ($users as $user) {
            $result[] = array(
                'id' => $user->id,
                'fullname' => fullname($user),
                'username' => $user->username,
                'email' => $user->email,
                'phone' => $user->phone1,
                'city' => $user->city
            );
        }

        return array(
            'users' => $result,
            'total' => $total,
            'sort' => $sort,
            'direction' => $direction,
            'page' => $page,
            'perpage' => $perpage
        );
    }
}
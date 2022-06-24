    private function getArraysPoints( $points_id, $work_id )
    {
        $result = array();

        $old_points = \Entity\WorkPoints::where('work_id', $work_id)->get();
        foreach ($old_points as $work_point){
            if ( in_array($work_point->point_id, $points_id)){
                $old_point[] = $work_point->point_id;
            }
            $old_del_point[] = $work_point->point_id;
        }
        if (isset($old_point)){
            $new_point = array_diff($points_id, $old_point);
            if (!empty($new_point)){
                $result['points_id'] = array_unique($new_point);
            }else{
                $del_point = array_diff($old_del_point,$points_id );
                if (!empty($del_point)){
                    $result['points_id'] = array_unique($del_point);
                }
            }
        }

        return $result;
    }

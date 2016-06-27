<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repository;
use App\User;
use App\Task;

/**
 * Description of TaskRepository
 *
 * @author NTHanh
 */
class TaskRepository
{
    //put your code here
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return $user->tasks()
                        ->orderBy('created_at', 'asc')
                        ->get();
    }

    public function saveTask(User $user, Task $task)
    {
        return $user->tasks()->save($task);
    }

    /**
     * 
     * @param User $user
     * @param Task $task
     * @return boolean
     */
    public function deleteTask(User $user, Task $task)
    {
        if ($user->id === $task->user_id)
        {
            return $task->delete();
        }
        return false;
    }

}

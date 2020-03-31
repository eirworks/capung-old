<?php


namespace App\Faker;


use Faker\Provider\Base;
use Illuminate\Support\Str;

class Project extends Base
{
    public function projectName()
    {
        $adj = [
            'heroic', 'brave', 'commendable', 'diligent', 'jaunty', 'playful', 'hardy',
            'beautiful', 'compassionate', 'lively', 'addicted', 'cringe', 'obey',
        ];
        $obj = [
            "bunny", 'kitty', 'kitten', 'dog', 'puppy', 'cub', 'elephant', 'seal',
            'rabbit', 'cat', 'bat', 'snake', 'cobra', 'armadillo', 'canary', 'wolf',
            'alligator', 'dove', 'ant', 'lizard', 'bird', 'peacock', 'chicken', 'hen',
        ];

        return ucfirst($this->generator->randomElement($adj)).' '.ucfirst($this->generator->randomElement($obj));
    }

    public function issueTitle()
    {
        $actions = [
            "create", 'read', 'access', 'delete', 'update', 'edit', 'restore', 'mark for delete',
            'change', 'get', 'send', 'retrieve', 'parse',
        ];

        $objects = [
            'comments', 'issues', 'project', 'content', 'deleted stuff', 'image', 'my stuff', 'client',
            'item',
        ];

        $items = [
            "Unable to X the Y",
            "The Y cannot be X",
            "Error: Y cannot be X",
        ];

        $title = $this->generator->randomElement($items);
        $title = Str::replaceArray('X', [$this->generator->randomElement($actions)], $title);
        $title = Str::replaceArray('Y', [$this->generator->randomElement($objects)], $title);

        return $title;
    }
}

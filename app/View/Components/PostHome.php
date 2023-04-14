<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Topic;
use App\Models\Post;
class PostHome extends Component
{

    public $topic = null;
    /**
     * Create a new component instance.
     */
    public function __construct($topic)
    {
        $this->topic=$topic;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $row_topic = $this->topic;
         $topid = $row_topic->id;
        $arrtopid = array();
        array_push($arrtopid, $topid);
        $list_post = Post::join('vtl_topic','vtl_topic.id','=','vtl_post.top_id')
        ->whereIn('top_id',$arrtopid)
        ->where('vtl_post.status','=','1')
        ->select('vtl_post.*', 'vtl_topic.title as top')
        ->orderBy('vtl_post.created_at','asc')
        ->take(3)
        ->get();
        return view('components.post-home',compact('list_post'));
    }
}

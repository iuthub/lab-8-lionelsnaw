<?php
namespace App;
use Illuminate\Session\Store;

class Post {
	private $session;

	public function __construct(Store $session){
		$this->session->get('posts');
		$this->createDummyData();
	}

	public function getPosts(){
		return $this->session->get('posts');

	}

	public function getPosts($id)
	{
		return $this->session->get('posts')[$id];
	}

	public function addPost($title, $content){
		$posts = $this->session->get('posts');
		array_push($posts, ['title'=> $title, 'content'=> $content]);
		$this->session->put('posts', $posts);
	}

	public function editPosts($id, $title, $content){
		$posts = $this->session->get('posts');
		$posts[$id] = ['title' =>$title, 'content' => $content];
		$this->session->put('posts', $posts);
	}

	private function createDummyData()
	{
		$posts = [
			[
				'title' => 'Learning Laravel',
				'content' => 'This blog will get your point inifnitely many times'
			],
			[
				'title' => 'somesthing else',
				'content' => 'Some other content will be demonstrated here'
			]
		];
		$this->session->put('posts', $posts);
	}

}
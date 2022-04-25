<?php

namespace BullsEye\Http\Controllers;

use BullsEye\Comment;
use BullsEye\Em_service;
use BullsEye\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {

        //
//        $em = Em_service::findOrFail($request->em_id);

        Comment::create([
            'body' => $request->body,
            'user_id' => Auth::id(),
            'pel_id' =>  $request->pel_id,
            'em_id' => $request->em_id,
            'gpr_id' =>  $request->gpr_id,
            'cement_id' =>  $request->cement_id,

        ]);
//        return redirect()->route('posts.show', $em->id);
        return back()->with('success', 'Comment Send Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \BullsEye\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \BullsEye\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BullsEye\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(CommentRequest  $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BullsEye\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Work;
use App\WorkSign;

class WorkController extends Controller
{
    public function __construct()
    {
        $this->work = new Work();
        $this->work_sign = new WorkSign();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = $this->work->recently();

        return view('work.index', array('works' => $works));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $work = Work::find($id);

        $isOwner = False;
        $isSigned = False;
        if(isset($_SESSION['website_login_session']['memberId']))
        {
            if($work->memberId == $_SESSION['website_login_session']['memberId'])
            {
                // show attendees in front page
                $isOwner = True;
            }
            else
            {
                // show registration or cancle in front page
                $isSigned = $this->work_sign->isSigned($id, $_SESSION['website_login_session']['memberId']);
            }
        }

        return view('work.show', array('work' => $work, 'isOwner' => $isOwner, 'isSigned' => $isSigned));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

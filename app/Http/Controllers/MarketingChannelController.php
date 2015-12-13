<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\MarketingChannel;
use App\Repositories\MarketingChannelRepository;

class MarketingChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(MarketingChannelRepository $MarketingChannelRepository)
    {
        $this->middleware('auth');

        $this->MarketingChannelRepository = $MarketingChannelRepository;
    }

    public function index()
    {
        //
        $search = \Request::get('search'); //<-- we use global request to get the param of URI
 
        
        if($search){

            $allMarketingChannel = MarketingChannel::whereRaw('channel_name = ?', [$search])
                ->orderBy('id','asc')
                ->paginate(5);    

        }else{

            $allMarketingChannel = MarketingChannel::orderBy('id', 'asc')->paginate(5);    
        }

        
        return view('MarketingChannel.index', [
            'MarketingChannels' => $allMarketingChannel,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('MarketingChannel.create');
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
        $this->validate($request, [
            'channel_name' => 'required|max:255',
        ]);

        MarketingChannel::create([
            'channel_name' => $request->channel_name,
        ]);

        return redirect('/marketingChannel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        return view('MarketingChannelStatus.index', [
            'MarketingChannel' => $this->MarketingChannelRepository->getMarketingChannel($id),
        ]);
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

        //return view('MarketingChannel.create', [
        //    'MarketingChannel' => $this->MarketingChannelRepository->getMarketingChannel($id),
        //]);


        return view('MarketingChannel.create', [
            'MarketingChannel' => $this->MarketingChannelRepository->getMarketingChannel($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

        $MarketingChannel = MarketingChannel::find($request->id);

        $MarketingChannel->channel_name = $request->channel_name;
        
        $MarketingChannel->save();

        return redirect('/marketingChannel');
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

        $MarketingChannel = MarketingChannel::find($id);
        $MarketingChannel->delete();

        return redirect('/marketingChannel')->with('delete_message', 'Marketing Channel deleted.');;
    }
}

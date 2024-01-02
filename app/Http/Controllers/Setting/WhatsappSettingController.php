<?php
/*
 * Ranjeet kumar maurya
 * Amethitech.
 * India-uttar pradesh (amethi )
 * +91-7217645059
 * ranjeet@amethitech.com
 * 
 */
/**
 * .
 * User: 
 * Date: 
 * Time: 
 */
namespace App\Http\Controllers\Setting;
use App\Http\Controllers\CollegeBaseController;

use App\Models\EmailSetting;
use App\Models\SmsSetting;
use App\Models\WhatsappSetting;
use Illuminate\Http\Request;

class WhatsappSettingController extends CollegeBaseController
{
    protected $base_route = 'setting.whatsapp';
    protected $view_path = 'setting.whatsapp';
    protected $panel = 'Whatsapp Setting';

    public function __construct()
    {

    }

    public function index()
    {
        $data['whatsappSetting'] = WhatsappSetting::orderBy('identity')->get();
        // dd($data['whatsappSetting']);
        return view(parent::loadDataToView($this->view_path.'.index'), compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        if (!$paymentSetting = WhatsappSetting::find($id)) return parent::invalidRequest();
        $fetchData = $request->except('_token');
        $config = json_encode($fetchData);
        $paymentSetting->update([
            'config' => $config
        ]);

        $request->session()->flash($this->message_success, $this->panel. ' successfully updated.');
        return redirect()->route($this->base_route);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {

    }


    public function active(request $request, $id)
    {
        if (!$row = WhatsappSetting::find($id)) return parent::invalidRequest();

        $request->request->add(['status' => 'active']);

       $row->update($request->all());
       WhatsappSetting::whereNotIn('id',[$id])->update(['status' => 0]);

        $request->session()->flash($this->message_success, $row->reg_no.' '.$this->panel.' Active Successfully.');
        return redirect()->route($this->base_route);
    }

    public function inActive(request $request, $id)
    {
        if (!$row = WhatsappSetting::find($id)) return parent::invalidRequest();

        $request->request->add(['status' => 'in-active']);

        $row->update($request->all());

        $request->session()->flash($this->message_success, $row->reg_no.' '.$this->panel.' In-Active Successfully.');
        return redirect()->route($this->base_route);
    }

}
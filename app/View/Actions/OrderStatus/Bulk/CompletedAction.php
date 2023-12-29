<?php

namespace App\View\Actions\OrderStatus\Bulk;

use App\Models\Bill;
use App\Models\User;
use App\Notifications\ChangeStatus;
use Illuminate\Support\Facades\Notification;
use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class CompletedAction extends Action
{
    /**
     * Any title you want to be displayed
     * @var String
     * */
    public $title = "Complete";

    /**
     * This should be a valid Feather icon string
     * @var String
     */
    public $icon = "check-square";

    /**
     * Execute the action when the user clicked on the button
     *
     * @param Array $selectedModels Array with all the id of the selected models
     * @param $view Current view where the action was executed from
     */
    public function handle($selectedModels, View $view)
    {
        $this->title = __('Completed');
        $bills = Bill::whereKey($selectedModels)->get();
        foreach ($bills as $bill) {
            $user = User::find($bill->user_id);
            if ($bill->status == config('app.bill_status.shipped')) {
                $bill->status = config('app.bill_status.completed');
                $bill->save();
                Notification::send($user, new ChangeStatus($bill));
            } else {
                continue;
            }
        }
    }
}

<?php

namespace App\Observers;

use App\Models\AdOn;
use App\Models\PlanCompilation;
use Carbon\Carbon;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;

class AdOnObserver implements ShouldHandleEventsAfterCommit
{
    /**
     * Handle the AdOn "created" event.
     */
    public function created(AdOn $adOn): void
    {
        $this->compileData($adOn);
    }

    /**
     * Handle the AdOn "updated" event.
     */
    public function updated(AdOn $adOn): void
    {
        $this->compileData($adOn);
    }

    /**
     * Handle the AdOn "deleted" event.
     */
    public function deleted(AdOn $adOn): void
    {
        $this->compileData($adOn);
    }

    /**
     * Handle the AdOn "restored" event.
     */
    public function restored(AdOn $adOn): void
    {
        $this->compileData($adOn);
    }

    /**
     * Handle the AdOn "force deleted" event.
     */
    public function forceDeleted(AdOn $adOn): void
    {
        $this->compileData($adOn);
    }

    private function compileData(AdOn $adOn)
    {
        $planCompilation = PlanCompilation::where('plan_id', '=', $adOn->plan_id)
            ->where('plan_type_id', '=', $adOn->plan_type_id)
            ->get();

        $adOn = AdOn::where('plan_id', '=', $adOn->plan_id)
            ->where('plan_type_id', '=', $adOn->plan_type_id)
            ->get();

        $ad_on_sum = $adOn->sum('value');

        if ($planCompilation->count() == 0) {
            return PlanCompilation::create([
                'plan_id' => $adOn[0]->plan_id,
                'plan_type_id' => $adOn[0]->plan_type_id,
                'value' => $adOn->sum('value')
            ]);
        }

        PlanCompilation::whereId($planCompilation[0]->id)->update([
            'value' => $ad_on_sum,
            'updated_at' => Carbon::now()
        ]);
    }
}

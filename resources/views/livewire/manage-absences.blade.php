<div class="p-6 text-xl">
    <div class="flex gap-4">
        <label for="initialDate">First date present in country</label>
        <input name="initialDate" type="date" wire:model="initialDate" /> <button class="outline p-4 bg-red" wire:click="setInitialDate">Set</button>
    </div>
    @if($initialDate)
        <table>
        <thead>
        <th>Exit Date</th>
        <th>Return Date</th>
        <th>Days Away</th>
        <th>Comments</th>
        </thead>
        <tbody>
        @foreach($this->absences as $absence)
            <livewire:absence-record :absence="$absence" :startDate="$initialDate" :wire:key="$absence->id"/>
        @endforeach
        <livewire:absence-record :startDate="$initialDate" wire:key="new" />
        </tbody>
        </table>
    @endif

</div>

<tr>
    @if($id && !$editMode)
        <td>{{$exitDate}}</td>
        <td>{{$returnDate}}</td>
        <td>{{$this->daysAway()}}</td>
        <td>{{$comment}}</td>
        <td></td>
    @else
        <td>
            <input class="w-full" type="date" wire:model.live="exitDate" />
            <div>@error('exitDate') {{ $message }} @enderror&nbsp;</div>
        </td>
        <td>
            <input class="w-full" type="date" wire:model.live="returnDate" />
            <div>@error('returnDate') {{ $message }} @enderror&nbsp;</div>
        </td>
        <td align="center">{{$daysAway}}<div>&nbsp;</div></td>
        <td><input type="text" wire:model="comment" /><div>&nbsp;</div></td>
        <td><button wire:click="save">Save</button><div>&nbsp;</div></td>
    @endif
</tr>

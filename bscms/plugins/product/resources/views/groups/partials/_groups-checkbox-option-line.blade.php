@php
/**
 * @var string $value
 */
$value = isset($value) ? (array)$value : [];
@endphp
@if($groups)
    <ul>
        @foreach($groups as $group)
            @if($group->id != $currentId)
                <li value="{{ $group->id ?? '' }}"
                        {{ $group->id == $value ? 'selected' : '' }}>
                    {!! Form::customCheckbox([
                        [
                            $name, $group->id, $group->name, in_array($group->id, $value),
                        ]
                    ]) !!}
                    @include('plugins.product::groups.partials._groups-checkbox-option-line', [
                        'product_group' => $group->child_groups,
                        'value' => $value,
                        'currentId' => $currentId,
                        'name' => $name
                    ])
                </li>
            @endif
        @endforeach
    </ul>
@endif
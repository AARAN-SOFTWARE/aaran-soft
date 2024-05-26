@props([
    'left' => false,
    'center' => false,
    'right' => false,
    'colspan' => 0,
    'class' =>'text-zinc-600'
])

<td colspan="{{$colspan}}" class = 'px-2 py-2 border border-gray-200 whitespace-no-wrap text-sm leading-2 text-gray-900'>
    <div {{ $attributes->class([
            'tracking-wider font-semibold text-md',
            'text-left'=>$left,
            'text-center'=>$center,
            'text-right'=>$right,
            $class
        ])}}>
        {{  $slot }}
    </div>
</td>

@props([
    'left' => false,
    'center' => false,
    'right' => false,
])

<th {{ $attributes->class([
    'tracking-wider border border-gray-300  bg-zinc-50 py-1.5 px-1 text-sm text-gray-400',
    'text-left'=>$left,
    'text-center'=>$center,
    'text-right'=>$right,
])}}>
    {{ $slot }}
</th>



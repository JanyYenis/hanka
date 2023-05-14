<div>
    @for ($i = 1; $i <= $estrellas; $i++)
        <i class="text-warning fas fa-star"></i>
    @endfor
    @if ($faltantes)
        @for ($i = 1; $i <= $faltantes; $i++)
            <i class="fas fa-star"></i>
        @endfor
    @endif
</div>
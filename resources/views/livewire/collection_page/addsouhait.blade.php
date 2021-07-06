<div>
    <a href="{{ route('mes_souhaits_path') }}">
        @if (sizeOf($this->souhait)==0)
        <i class="fa fa-heart-o"></i>
        @else
        <i class="fa fa-heart"></i>
        @endif
        <span>Vos Souhaits</span>
        <div class="qty" id="souhait" data-souhait="{{ sizeOf($this->souhait) }}">{{ sizeOf($this->souhait) }}</div>
    </a>
</div>

<div>
<div class="searchinf_area">
    <div class="container">
        <div class="search_bar" style="display: block;">
            <div class="inner_search">
                <div class="col-lg-2">
                    <label><input type="radio" wire:ignore @change="$wire.set('transaction_type', $event.target.value)" :checked="$wire.transaction_type == 'rent'" name="transaction_type" value="rent" /> Rent</label>
                    <label><input type="radio" wire:ignore @change="$wire.set('transaction_type', $event.target.value)" :checked="$wire.transaction_type == 'sale'" name="transaction_type" value="sale" /> Sale</label>
                    <label><input type="radio" wire:ignore @change="$wire.set('transaction_type', $event.target.value)" :checked="$wire.transaction_type == ''" name="transaction_type" value="" /> All</label>
                </div><!--END OF COL MD 3-->

                <div class="col-md-6">
                    <input type="text" wire:ignore @input="$wire.set('location', $event.target.value)" class="form-control" placeholder="Area" />
                    <select wire:ignore @change="$wire.set('property_type', $event.target.value)" :value="$wire.property_type" class="form-control">
                        <option value="">Property Type</option>
                        <option value="Apartment">Apartment</option>
                        <option value="Villa">Villa</option>
                        <option value="House">House</option>
                        <!-- Add more options as needed -->
                    </select>
                    <select wire:ignore @change="$wire.set('bedrooms', $event.target.value)" :value="$wire.bedrooms" class="form-control">
                        <option value="">Bedrooms</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5+</option>
                    </select>
                </div><!--END OF COL MD 6-->
                <div class="col-lg-4 col-md-6 range" wire:ignore>
                    <div class="search_content ">
                        <input type="hidden" id="min_price" />
                        <input type="hidden" id="max_price" />
                        <input type="hidden" id="slider_range" class="flat-slider" />
                    </div><!--END OF SEARCH CONTENT-->
                    <a href="#" wire:click.prevent="search"><img src="images/search_btn.png" alt="" /></a>
                </div><!--END OF COL MD 4-->
            </div><!--END OF INNER SEARCH-->
        </div><!--END OF SEARCH BAR-->
    </div><!--END OF CONTAINER-->
</div><!--END OF SEARCHINF AREA-->

<div class="bottom_two">
    <h2>properties<span> for {{ $transaction_type ?: 'all' }}</span></h2>
    @foreach ($properties as $property)
        <div class="listing">
            <div class="property_list">
                <a href="{{ route('property.detail', $property->slug) }}">
                    <img src="{{ $property->first_image_url }}" alt="{{ $property->title }}" class="img-responsive" />
                    <div class="spec">
                        <h4>AED {{ number_format($property->price ?? 0, 0) }}</h4>
                        <ul>
                            <li><img src="images/bed2.jpg" /> {{ $property->bedrooms ?? '-' }}</li>
                            <li><img src="images/bath2.jpg" /> {{ $property->bathrooms ?? '-' }}</li>
                        </ul>
                    </div><!--END OF SPEC-->
                    <div class="clearfix"></div>
                    <p>{{ Str::limit($property->description ?? 'No description', 80) }}</p>
                    <p><span>{{ $property->location ?? '-' }}</span></p>
                </a>
            </div>
        </div>
    @endforeach
</div><!--END OF BOTTOM 2-->

<div class="paging col-lg-12">
    {{ $properties->links() }}
</div><!--END OF PAGINF-->

<script>
document.addEventListener('livewire:loaded', () => {
    // Initialize slider
    jQuery("#slider_range").flatslider({
        min: 10000,
        max: 100000000,
        step: 1,
        values: [10000, 100000000],
        range: true,
        einheit: '',
        change: function(event, ui) {
            @this.set('min_price', ui.values[0]);
            @this.set('max_price', ui.values[1]);
        }
    });
});
</script>
</div>

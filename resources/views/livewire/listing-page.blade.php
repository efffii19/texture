<div>
@livewire('header')

<div class="container" dir="ltr">
    <div class="searchinf_area">
        <div class="search_bar" style="display: block;">
            <div class="inner_search">
                    <div class="col-lg-2">
                        <label><input type="radio" wire:model.live="transaction_type" name="transaction_type" value="rent" /> Rent</label>
                        <label><input type="radio" wire:model.live="transaction_type" name="transaction_type" value="sale" /> Sale</label>
                        <label><input type="radio" wire:model.live="transaction_type" name="transaction_type" value="" /> All</label>
                    </div><!--END OF COL MD 3-->

                    <div class="col-md-6">
                        <input type="text" wire:model.live="location" class="form-control" placeholder="Area" />
                        <select wire:model.live="property_type" wire:ignore class="form-control no-nice">
                            <option value="">Property Type</option>
                            <option value="Apartment">Apartment</option>
                            <option value="Villa">Villa</option>
                            <option value="House">House</option>
                            <!-- Add more options as needed -->
                        </select>
                        <select wire:model.live="bedrooms" wire:ignore class="form-control no-nice">
                            <option value="">Bedrooms</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5+</option>
                        </select>
                    </div><!--END OF COL MD 6-->
                    <div class="col-lg-4 col-md-6 range">
                        <div class="search_content ">
                            <input type="hidden" id="min_price" />
                            <input type="hidden" id="max_price" />
                            <input type="hidden" id="slider_range" class="flat-slider" />
                        </div><!--END OF SEARCH CONTENT-->
                        <a href="#" wire:click.prevent="search"><img src="images/search_btn.png" alt="" /></a>
                    </div><!--END OF COL MD 4-->
                </div><!--END OF INNER SEARCH-->
            </div><!--END OF SEARCH BAR-->
        </div><!--END OF SEARCHINF AREA-->

<div class="bottom_two" dir="ltr">
    <h2>Properties <span>for {{ $transaction_type ?: 'all' }}</span></h2>

    <div class="row">
        @forelse ($properties as $property)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="property_list">
                    <a href="{{ route('property.detail', $property->slug) }}">
                        <img src="{{ $property->first_image_url ?? asset('images/no-image.jpg') }}"
                             alt="{{ $property->title }}" class="img-responsive" />

                        <div class="spec">
                            <h4>AED {{ number_format($property->price ?? 0, 0) }}</h4>
                            <ul>
                                <li><img src="{{ asset('images/bed2.jpg') }}" /> {{ $property->bedrooms ?? '-' }}</li>
                                <li><img src="{{ asset('images/bath2.jpg') }}" /> {{ $property->bathrooms ?? '-' }}</li>
                            </ul>
                        </div>

                        <div class="clearfix"></div>
                        <p>{{ Str::limit($property->description ?? 'No description available', 80) }}</p>
                        <p><span>{{ $property->location ?? '-' }}</span></p>
                    </a>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-3">
                <p>No properties found for the selected filters.</p>
            </div>
        @endforelse
    </div> <!-- END ROW -->
</div>

    <div class="paging col-lg-12">
        {{ $properties->links() }}
    </div><!--END OF PAGINF-->
</div><!--END OF CONTAINER-->

@livewire('footer')

<script>
document.addEventListener('livewire:loaded', () => {
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

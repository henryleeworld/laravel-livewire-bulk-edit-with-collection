<div>
    <button data-bs-toggle="modal" data-bs-target="#categories-modal" class="btn btn-success" {{ $bulkDisabled ? 'disabled' : null }}>{{ trans('frontend.product.button.bulk_edit') }}</button>
    <table class="table table-stripped mt-3">
        <tr>
            <th></th>
            <th>{{ trans('frontend.product.content.name') }}</th>
            <th>{{ trans('frontend.product.content.category') }}</th>
        </tr>
        @foreach($products as $product)
            <tr>
                <th>
                    <input type="checkbox" wire:model.live="selectedProducts.{{ $product->id }}">
                </th>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
            </tr>
        @endforeach
    </table>
    <div class="modal fade" id="categories-modal" tabindex="-1" aria-labelledby="categories-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="categories-modal-label">{{ trans('frontend.category.title') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <select wire:model="selectedCategory" class="form-control">
                        <option value="null">{{ trans('frontend.category.content.please_select') }}</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="changeCategory">{{ trans('frontend.category.content.save_changes') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>

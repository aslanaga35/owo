<!-- Start Modal payPerViewForm -->
<div class="modal fade" id="editForm" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
	<div class="modal-dialog modal- modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body p-0">
				<div class="card bg-white shadow border-0">

					<div class="card-body px-lg-5 py-lg-5 position-relative">

						<div class="mb-4">
							{{ __('admin.edit') }} <i class="bi-arrow-right ml-1 mr-1"></i> <strong>{{ $product->name }}</strong>
						</div>

						<form method="post" action="{{url('edit/product', $product->id)}}" id="shopProductForm">

							<input type="hidden" name="id" value="{{ $product->id }}" />
							@csrf

							<div class="form-group">
                <input type="text" class="form-control" value="{{ $product->name }}" name="name" placeholder="{{ __('admin.name') }}">
              </div>

							<div class="form-group">
								<input type="text" class="form-control isNumber" value="{{ $product->price }}" autocomplete="off" name="price" placeholder="{{ __('general.price') }}">
							</div>

							<div class="form-group">
								<input type="text" class="form-control" name="tags" value="{{ $product->tags }}" placeholder="{{ __('general.tags') }}">
							</div>

							@if ($product->type == 'custom')
							<div class="form-group">
								<select name="delivery_time" class="form-control custom-select">
									<option value="" selected>{{ __('general.delivery_time') }}</option>
									@for ($i=1; $i <= 30; ++$i)
										<option @if ($product->delivery_time == $i) selected @endif value="{{$i}}">{{$i}} {{ trans_choice('general.days', $i) }}</option>
									@endfor
								</select>
							</div>
						@endif

						<div class="form-group">
							<textarea class="form-control" name="description" placeholder="{{ __('general.description') }}" rows="5">{{ $product->description }}</textarea>
						</div>

						<div class="form-group">
							<div class="custom-control custom-switch custom-switch-lg">
								<input type="checkbox" class="custom-control-input" name="status" value="1" @if ($product->status) checked @endif id="customSwitch2">
								<label class="custom-control-label switch" for="customSwitch2">{{ __('general.status') }}</label>
							</div>
						</div>

							<div class="alert alert-danger display-none mb-0" id="errorShopProduct">
									<ul class="list-unstyled m-0" id="showErrorsShopProduct"></ul>
								</div>

							<div class="text-center">
								<a href="#" class="btn e-none mt-4" data-dismiss="modal">{{trans('admin.cancel')}}</a>

								<button type="submit" id="shopProductBtn" class="btn btn-primary mt-4">
									<i></i> {{trans('admin.save')}}
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!-- End Modal BuyNow -->

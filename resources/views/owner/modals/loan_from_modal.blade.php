 
           
                   <!-- Modal -->
                   <div class="modal fade" id="loan_from" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                        <h5 class="modal-title" id="staticBackdropLabel">New Loan</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="owner-loan-from-modal">
                                @csrf
                  
                                <input id="shop_id" type="text" class="form-control @error('shop_id') is-invalid @enderror" name="shop_id" value="{{Session::get('shop_id') }}" hidden autocomplete="shop_id">
                                <input id="owner_id" type="text" class="form-control @error('owner_id') is-invalid @enderror" name="owner_id" value="{{ Session::get('owner_id') }}" hidden autocomplete="owner_id">
                                <input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="Month" hidden autocomplete="type">
          
                                <div class="form-group row">
                                  
                                    <div class="col-md-6">
                                        <label for="name" class="col-md- col-form-label text-md-right">{{ __('Personal/Institute Name') }}</label>
                  
                                        <input required id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name">
                                         
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                    
                                    <div class="col-md-6">
                                        <label for="amount" class="col-form-label text-md-right">{{ __('Amount Loaned') }}</label>
                          
                                        <input required id="amount" type="number" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}"  autocomplete="amount">
                                        
                                        @error('amount')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group row">
                                  
                                    <div class="col-md-6">
                                        <label for="loan_date" class="col-md- col-form-label text-md-right">{{ __('Loan Date') }}</label>
                  
                                        <input required id="loan_date" type="date" class="form-control @error('loan_date') is-invalid @enderror" name="loan_date" value="{{ old('loan_date') }}"  autocomplete="loan_date">
                                     
                                        @error('loan_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                    
                                    <div class="col-md-6">
                                        <label for="final_date" class="col-md-4 col-form-label text-md-right">{{ __('Final Date') }}</label>
                          
                                        <input id="final_date" type="date" class="form-control @error('final_date') is-invalid @enderror" name="final_date" value="{{ old('final_date') }}"  autocomplete="final_date">
                                         
                                        @error('final_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group row">
                                  
                                    <div class="col-md-6">
                                        <label for="instalment" class="col-md- col-form-label text-md-right">{{ __('Instalment') }}</label>
                  
                                        <input required id="instalment" type="text" class="form-control @error('instalment') is-invalid @enderror" name="instalment" value="{{ old('instalment') }}"  autocomplete="instalment">
                                     
                                        @error('instalment')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    </div>

                    
                                <div class="form-group row mb-0">
                                    <div class="col-md-10 ">
                                        
                                    </div>
                                    <div class="col-md-2 modal-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            {{ __('Save') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                  
                  
                    </div>
                  </div> 
                  
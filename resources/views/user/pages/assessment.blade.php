
@extends('user.layouts.app')

@section('main-content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <section class="gift_section layout_padding-bottom" style="margin-top: 10%">
        <div class="box mt-5">
            <meta name="csrf-token" content="{{ csrf_token() }}" slug="{{ $slug }}">
            <div class="container-fluid">
                <!-- HTML -->
                <form id="assessmentForm">
                    <div class="row mb-5">
                        @csrf
                        @if (count($assessments) > 0)
                            @foreach ($assessments as $key => $assessment)
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="btn" data-bs-toggle="collapse" href="#collapse{{ $key + 1 }}">
                                                <i class="fas fa-chevron-down"></i>
                                                Q.No.{{ $key + 1 }} {{ $assessment->heading }}
                                            </a>
                                        </div>
                                        <div id="collapse{{ $key + 1 }}" class="collapse" data-bs-parent="#accordion">
                                            <div class="card-body">
                                                <div class="SelectableBox_selectableBoxWrapper__8C_pp RadioInput_radioInputSelectableBox__T66Y9">
                                                    <div role="button" class="RadioButton_radioBtnCheckmark__iC8hh">
                                                        <div class="RadioButton_radioBtnCheckmarkInner__a3NYQ"></div>
                                                    </div>
                                                    <div class="RadioInput_radioInputTextsWrapper__ckXWb">
                                                        <div>
                                                            <input type="radio" name="response{{ $key + 1 }}"
                                                                   id="item{{ $key + 1 }}-yes" value="yes">
                                                            <label for="item{{ $key + 1 }}-yes"
                                                                   class="RadioInput_radioInputBestOptionWrapper__ip508">Yes</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="SelectableBox_selectableBoxWrapper__8C_pp RadioInput_radioInputSelectableBox__T66Y9">
                                                    <div role="button" class="RadioButton_radioBtnCheckmark__iC8hh">
                                                        <div class="RadioButton_radioBtnCheckmarkInner__a3NYQ"></div>
                                                    </div>
                                                    <div class="RadioInput_radioInputTextsWrapper__ckXWb">
                                                        <div>
                                                            <input type="radio" name="response{{ $key + 1 }}"
                                                                   id="item{{ $key + 1 }}-no" value="no">
                                                            <label for="item{{ $key + 1 }}-no"
                                                                   class="RadioInput_radioInputBestOptionWrapper__ip508">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    </div>
                    @else
                        <p>No questions available.</p>
                @endif
            </div>
            <div class="col-md-12 text-center">
                <button type="button" class="btn btn-danger" id="calculateButton"
                        style="color: white; background-color: #055875 !important; border: #055875">Submit</button>
                <div id="result">
                    <span id="totalYes"></span><br>
                    <span id="totalNo"></span>
                </div>
            </div>
            </form>
            <!-- Result and Product Recommendations -->
            <div id="productRecommendations"></div>
        </div>
        </div>
    </section>
@endsection

@push('frontend_script')
    <script>
        $(document).ready(function() {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var slug = $('meta[name="csrf-token"]').attr('slug');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                method: 'POST',
                url: "{{ route('getServiceProducts') }}", // Wrap the route in quotes
                // dataType: 'json',
                data: {
                    slug: slug,
                },
                success: function(response) {
                    responseData = response;
                    processData();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('Error fetching data: ', errorThrown);
                }
            });
        });

        function processData() {
            const productData = responseData.data;
            const calculateButton = document.getElementById("calculateButton");
            const totalYesSpan = document.getElementById("totalYes");
            const totalNoSpan = document.getElementById("totalNo");
            const resultDiv = document.getElementById("result");
            const productRecommendationsDiv = document.getElementById("productRecommendations");

            calculateButton.addEventListener("click", function() {
                let totalYes = 0;
                let totalNo = 0;
                let productRecommendationsHTML = '';

                // Loop through radio inputs to calculate totals
                const assessments = document.querySelectorAll('input[type="radio"]');
                assessments.forEach(function(assessment) {
                    if (assessment.checked) {
                        if (assessment.value === "yes") {
                            totalYes++;
                        } else if (assessment.value === "no") {
                            totalNo++;
                        }
                    }
                });

                // Calculate the percentage
                const totalQuestions = assessments.length / 2; // Assuming 2 radio buttons per question
                const percentageYes = (totalYes / totalQuestions) * 100;

                // Display total Yes and No
                totalYesSpan.textContent = totalYes;
                totalNoSpan.textContent = totalNo;

                if (percentageYes >= 60) {
                    resultDiv.innerHTML = "";

                    // Create a row container for products
                    productRecommendationsHTML += `<div class="row">`;

                    productData.forEach(function(product) {
                        var imagePath = "{{ asset('assets/products-images/') }}";

                        var productImage = product.images;

                        images = imagePath + '/' + productImage;

                        productRecommendationsHTML += `
                        <div class="col-md-3 mb-4 mt-5" >
                            <!-- bbb_deals -->
                            <div class="bbb_deals" style="max-height: 500px; min-height: 500px;">
                                <div class="ribbon ribbon-top-right"><span><small class="cross">x </small>4</span></div>
                                <div class="bbb_deals_title">${product.name}</div>
                                <div class="bbb_deals_slider_container">
                                    <div class="bbb_deals_item">
                                        <div class="bbb_deals_image">
                                        <img src="${images}" width="100" height="200" alt=""></div>
                                        <div class="bbb_deals_content">
                                            <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                                <div class="bbb_deals_item_category"><a href="#"></a>${product.services.name}</div>
                                            </div>
                                            <div class="bbb_deals_info_line d-flex flex-row justify_content_start">
                                                <div class="bbb_deals_item_name">${product.name}</div>
                                            </div>
                                            <div class="available">
                                                <div class="available_line d-flex flex-row justify-content-start">
                                                    <div class="available_title">Available: <span></span></div>
                                                    <div class="sold_stars ml-auto">
                                                    </div>
                                                </div>
                                                <div class="available_bar"><span style=""></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`;

                        // Check if four products have been added to the row, then close the row container
                        if (product.quantity % 4 === 0) {
                            productRecommendationsHTML += `</div><div class="row">`;
                        }
                    });

                    // Close the last row container
                    productRecommendationsHTML += `</div>`;

                    productRecommendationsDiv.innerHTML = productRecommendationsHTML;
                } else {
                    resultDiv.innerHTML = "We have no product available based on your test results.";
                    productRecommendationsDiv.innerHTML = ""; // Clear any previous recommendations
                }

                // Reset radio inputs and count values
                assessments.forEach(function(assessment) {
                    assessment.checked = false;
                });
                totalYesSpan.textContent = "0";
                totalNoSpan.textContent = "0";
            });
        }
    </script>
@endpush


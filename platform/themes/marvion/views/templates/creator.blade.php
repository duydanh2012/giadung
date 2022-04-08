@php
    Theme::asset()->add('creator-detail-css', 'assets/css/creator-detail.css', [], [], '1.0.1');
    Theme::asset()->container('footer')->add('creator-detail-js', 'assets/js/creator-detail.js', [], [], '1.0.1');
@endphp
{!! Theme::partial('breadcrumb', ['image' => $page->image, 'title' => $page->name]) !!}

<!-- info creator -->
<div class="wrapCreator">
    <div class="container-xl">
        <div class="contentCreator">
            <div class="wrapImgCreator">
                <img src="/assets/images/creator/c-1.JPG" alt="BiZhan Tong" />
    
                <div class="wrapTextInfoCreator">
                    <div class="titleNameCreator">Bizhan Tong</div>
                    <div class="titleTypeCreator">Producer/Director</div>
                    <div class="titlePlaceCreator">Phoenix Waters Limited</div>
                </div>
            </div>

            <div class="wrapTextDesCreator">                    
                <div class="title4 titleBlockCreator">Overview of creator</div>

                <div class="contentTextCreator">
                    <p>As a British born Chinese, Bizhan Tong spent his life seeking to understand his cultural heritage by living in two worlds while striving to bring the East and the West into one. With a background in film finance investing in Film and Series slates, Bizhan was also a passionate filmmaker with a keen interest in philanthropy, sitting on the boards of 3 charities across Hong Kong and the UK while spearheading initiatives around equality.</p>

                    <p>He went on to form Phoenix Waters Productions, a production company exploring social issues through the power of film, and won several awards for The Escort, a film he wrote, directed, and produced which is currently being adapted for the stage in the US with an Asian remake on the way.</p>

                    <p>Bizhan has since moved to Hong Kong where he partnered with film companies across the globe including the UK, US, Japan, Korea, and Hong Kong in an effort to bring local Asian stories to global audiences. He partnered with ATV, Hong Kong’s oldest broadcaster behind the Donnie Yen Fist of Fury franchise, as its Executive Producer to relaunch its creative department and spearhead the creative direction of the studio.</p>

                    <p>As part of Tong’s vision to make the Hong Kong film industry more globally focused they subsequently launched AMM Global, an international theatrical arm which Bizhan runs telling stories for global audiences starting with Lockdown, an international thriller written in response to a personal tragedy during the pandemic which tells a timeless story about this moment in time.</p>

                    <p>Following Lockdown Bizhan’s upcoming projects include crime drama series Forensic Psychologist, a Hong Kong remake of Richard Linklater’s Tape, and Hong Kong's biggest zombie film in history Chungking Mansions featuring an international cast.</p>
                </div>
            </div>

            <div class="wrapTextDesCreator">
                <div class="title4 titleBlockCreator">Awards</div>

                <div class="contentTextCreator">
                    <p>1. Festival of Cinema NYC  – Best Director Winner 2018 (for The Escort).</p>

                    <p>2. IndieFEST Film Awards: 
                    <br />– Award of Merit Special Mention 2018: Feature Film (for The Escort).
                    <br />– Award of Merit 2018: Director and Script/Writer (for The Escort).</p>

                    <p>3. MedFF – Winner 2018: Best Romance Film (for The Escort).</p>

                    <p>4. Rahway International Film Festival – Best Screenplay of a Feature Film 2018 (for The Escort).</p>

                    <p>5. Westfield International Film Festival – Best Screenplay of a Feature Film 2018 (for The Escort).</p>
                </div>
            </div>

            <!-- <div class="wrapTabTextCreator">
                <div class="title4 titleBlockCreator">h-NFT projects</div>

                <div class="nav nav-tabs" id="nav-tab-creator" role="tablist">
                    <a class="nav-link active" id="nav-Description-tab" data-toggle="tab" href="#nav-Description" role="tab" aria-controls="nav-Description" aria-selected="true" title="Description">Description</a>

                    <a class="nav-link" id="nav-Legal-Documents-tab" data-toggle="tab" href="#nav-Legal-Documents" role="tab" aria-controls="nav-Legal-Documents" aria-selected="false" title="Legal Documents">Legal Documents</a>
                </div>
                
                <div class="tab-content" id="nav-tabContent-creator">
                    <div class="tab-pane fade show active" id="nav-Description" role="tabpanel" aria-labelledby="nav-Description-tab">
                        <div class="contentTextCreator">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-Legal-Documents" role="tabpanel" aria-labelledby="nav-Legal-Documents-tab">
                        <div class="contentTextCreator">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="wrapProductionCreator">
                <div class="title4 titleBlockCreator">Production</div>
                
                <div class="listProductTionCreator">
                    <div class="row rowProductTionCreator">
                        <div class="col-6 col-sm-6 col-lg-4 colItemProduction">
                            <a href="javascript:void(0);" class="wrapImgResize linkItemProduction" title="Production">
                                <img src="assets/images/creator/pr-1.jpg" alt="Production" />
                            </a>
                        </div>

                        <div class="col-6 col-sm-6 col-lg-4 colItemProduction">
                            <a href="javascript:void(0);" class="wrapImgResize linkItemProduction" title="Production">
                                <img src="assets/images/creator/pr-2.JPG" alt="Production" />
                            </a>
                        </div>

                        <div class="col-6 col-sm-6 col-lg-4 colItemProduction">
                            <a href="javascript:void(0);" class="wrapImgResize linkItemProduction" title="Production">
                                <img src="assets/images/creator/pr-3.JPG" alt="Production" />
                            </a>
                        </div>

                        <div class="col-6 col-sm-6 col-lg-4 colItemProduction">
                            <a href="javascript:void(0);" class="wrapImgResize linkItemProduction" title="Production">
                                <img src="assets/images/creator/pr-4.JPG" alt="Production" />
                            </a>
                        </div>

                        <div class="col-6 col-sm-6 col-lg-4 colItemProduction">
                            <a href="javascript:void(0);" class="wrapImgResize linkItemProduction" title="Production">
                                <img src="assets/images/creator/pr-5.jpg" alt="Production" />
                            </a>
                        </div>

                        <div class="col-6 col-sm-6 col-lg-4 colItemProduction">
                            <a href="javascript:void(0);" class="wrapImgResize linkItemProduction" title="Production">
                                <img src="assets/images/creator/pr-6.jpg" alt="Production" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end info creator -->

<?php

    $zba_aparat = get_post_meta(get_the_ID(), '_zba_aparat', true);

    if ($zba_aparat) {
        $zba_aparat = heyat_remote('https://www.aparat.com/etc/api/video/videohash/' . esc_html(link_to_code($zba_aparat)));

        if ($zba_aparat[ 'code' ] == 0) {
            $zba_aparat = $zba_aparat[ 'result' ];
            if (isset($zba_aparat->video)) {
                $file_link = $zba_aparat->video->file_link;
            } else {
                $zba_aparat = '';
            }
        } else {
            $zba_aparat = '';
        }
    }

if ($zba_aparat): ?>
<div class="my-3">

    <div class="row justify-content-center seperator">
        <h3 class="text-white text-center">ویدئو</h3>
        <div class="col-12 mt-3"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1013.87 35.997"
                style="width: 100%;">
                <path id="Path_37" data-name="Path 37"
                    d="M165.491,1113.2H639.982c2.086,9.355,5.9,14.059,9.174,16.633,4.947,3.9,10.224,4.16,16.558,10.456a35.324,35.324,0,0,1,4.811,5.97,36.627,36.627,0,0,1,5.034-6.921c4.461-4.806,8.051-5.963,11.188-8.554,3.169-2.617,6.867-7.518,8.5-17.584h484.112"
                    transform="translate(-165.491 -1112.199)" fill="none" stroke="#d3b572" stroke-miterlimit="10"
                    stroke-width="2"></path>
            </svg></div>
    </div>

    <video class=" w-100 rounded-3 my-3" controls src="<?php echo $file_link ?>"></video>

    <a href="<?php echo $file_link ?>" target="_blank" class="btn btn-primary btn-gradient mt-3 w-100 ">دانلود ویدئو</a>
</div>
<?php endif; ?>
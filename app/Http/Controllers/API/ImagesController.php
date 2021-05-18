<?php



namespace App\Http\Controllers\API;



use App\ImageUpload;

use App\Http\Controllers\Controller;

use Illuminate\Support\Collection;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;

use Illuminate\Support\Str;

use Intervention\Image\Facades\Image;



class ImagesController extends Controller

{



    public function index($id)

    {

        $images = ImageUpload::where('productId', $id)->latest()->paginate(100);

        return $images;

    }





    public function store(Request $request, $id)

    {





        if (count($request->images)) {

            foreach ($request->images as $image) {

                $image->store('images');



            }

        }



    }







    public function upload(Request $request, $id)

    {



        if(! is_dir(public_path('/images/'))){

            mkdir(public_path('/images/'). 0777);

        }



        $images = count($request->images); //COUNT IMAGES THAT ARE BEING UPLOADED

        $imageCount = ImageUpload::where('productId', $id)->get(); //FETCH IMAGES FROM DATABASE

        $total = $imageCount->count() + $images; //COUNT IMAGES FROM THE DATABASE AND IMAGES THAT ARE BEING UPLOADED



        if($total <= 6){

            foreach ($request->images as $image) {


                $basename = Str::random();

                $original = $basename . '.'.$image->getClientOriginalExtension();

                // $thumbnail = $basename . '_thumb.'.$image->getClientOriginalExtension();



                // Image::make($image)

                //     ->fit(200,200)

                //     ->save(public_path('/images/'. $thumbnail));



                Image::make($image)

                    ->fit(450,450)

                    ->save(public_path('/images/'. $original));



                // $image->move(public_path('/images/'), $original);



                ImageUpload::create([

                    'image' => $original,

                    'productId' => $id

                ]);

            }







        }else{

            return false;

        }



    }







    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        //

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, $id)

    {

        //

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {



        $imageUpload = ImageUpload::findOrfail($id);

        //delete the files



            File::delete([

                public_path(('/images/').$imageUpload->image),

                public_path(('/images/').$imageUpload->thumbnail)

            ]);



        //delete record database



		$imageUpload->delete();

    }

}


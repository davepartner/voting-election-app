<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repositories\CategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Auth;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\NominationUser;
use App\Models\Nomination;
use App\Models\Voting;
use App\Models\Category;

class CategoryController extends AppBaseController
{
    /** @var  CategoryRepository */
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepository = $categoryRepo;
    }

    /**
     * Display a listing of the Category.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->categoryRepository->pushCriteria(new RequestCriteria($request));
        $categories = $this->categoryRepository->all();

        //voters should see a differently designed index
        if(Auth::user()->role_id == 4){
            return view('categories.election-index')
            ->with('categories', $categories);
        }


        return view('categories.index')
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new Category.
     *
     * @return Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created Category in storage.
     *
     * @param CreateCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateCategoryRequest $request)
    {

        $input = $request->all();

        //Store events in the database
        $this->validate($request, [

            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
    
        ]);

      

       
        
            $data = $request->all();  
            
            $data['user_id'] = Auth::user()->id;

            if($request->file('image') ){
                 $image = $request->file('image');
            //get the name of the image
            $input['imagename'] = $image->getClientOriginalName();
            $data['image'] = $input['imagename'];
            }
           

            

            $categoryUpload = Category::create($data);

            if($categoryUpload ){

                if($request->file('image')){
                     //choose where to save it in our larave app
                    $destinationPath = public_path('/storage/upload/images/'.$categoryUpload->id.'/');
                
                    $image->move($destinationPath, $input['imagename']);
                }
               
            }
      

        Flash::success('Category saved successfully.');

        return redirect(route('categories.index'));
    }

    /**
     * Display the specified Category.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Category not found');
            //voters should see a differently designed index
            if(Auth::user()->role_id == 4){
                return view('categories.election-index')
                ->with('categories', $categories);
            }
            return redirect(route('categories.index'));
        }



        $nominations = Nomination::all(); //all nominations
        $nominationSelecteds = Nomination::where('is_admin_selected', 1)->get(); //admin selected nominations




//check if this viewer has nominated someone in this category before
// A user can only nominate one person per category, unless they are an admin
$hasNominatedBefore = 0;
$nominationUser = NominationUser::where('user_id', Auth::user()->id)
                                 ->where('category_id', $id )->first();
 $nomination = 0;

if(Auth::user()->role_id > 2 ){ //admins can nominate more than once

 $nominationUser = NominationUser::where('user_id', Auth::user()->id)
                                 ->where('category_id', $id )->first();
 $nomination = 0;

           if($nominationUser) {
                $hasNominatedBefore = 1;

                //get details the nomination they made
                $nomination = Nomination::find($nominationUser['nomination_id']); 
                Flash::success('You have already nominated someone in this category');

           }      

        }                 

        
//check  if this person has voted in this category before
$checkVote = Voting::where('user_id', Auth::user()->id)
->where('category_id', $category->id)->first();
if($checkVote){

    Flash::success('You have voted before');

}

//find next and previous categories

$nextCategory = Category::where('id', '>' ,$id)->first();
$previousCategory = Category::where('id', '<' ,$id)->first();

//voters should see a differently designed index
if(Auth::user()->role_id == 4){
    return view('categories.election-show')->with('category', $category)
           ->with('nominations', $nominations)
           ->with('nominationSelecteds', $nominationSelecteds)
                ->with('nomination', $nomination)
                ->with('hasNominatedBefore', $hasNominatedBefore)
           ->with('checkVote', $checkVote)
           ->with('nextCategory', $nextCategory)
           ->with('previousCategory', $previousCategory);
}


           return view('categories.show')->with('category', $category)
           ->with('nominations', $nominations)
           ->with('nominationSelecteds', $nominationSelecteds)
                ->with('nomination', $nomination)
                ->with('hasNominatedBefore', $hasNominatedBefore)
           ->with('checkVote', $checkVote)
           ->with('nextCategory', $nextCategory)
           ->with('previousCategory', $previousCategory);


    }

    /**
     * Show the form for editing the specified Category.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        return view('categories.edit')->with('category', $category);
    }

    /**
     * Update the specified Category in storage.
     *
     * @param  int              $id
     * @param UpdateCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategoryRequest $request)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        $category = $this->categoryRepository->update($request->all(), $id);

        Flash::success('Category updated successfully.');

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified Category from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        $this->categoryRepository->delete($id);

        Flash::success('Category deleted successfully.');

        return redirect(route('categories.index'));
    }
}

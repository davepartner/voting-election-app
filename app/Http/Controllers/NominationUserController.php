<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNominationUserRequest;
use App\Http\Requests\UpdateNominationUserRequest;
use App\Repositories\NominationUserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class NominationUserController extends AppBaseController
{
    /** @var  NominationUserRepository */
    private $nominationUserRepository;

    public function __construct(NominationUserRepository $nominationUserRepo)
    {
        $this->nominationUserRepository = $nominationUserRepo;
    }

    /**
     * Display a listing of the NominationUser.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->nominationUserRepository->pushCriteria(new RequestCriteria($request));
        $nominationUsers = $this->nominationUserRepository->all();

        return view('nomination_users.index')
            ->with('nominationUsers', $nominationUsers);
    }

    /**
     * Show the form for creating a new NominationUser.
     *
     * @return Response
     */
    public function create()
    {
        return view('nomination_users.create');
    }

    /**
     * Store a newly created NominationUser in storage.
     *
     * @param CreateNominationUserRequest $request
     *
     * @return Response
     */
    public function store(CreateNominationUserRequest $request)
    {
        $input = $request->all();

        $nominationUser = $this->nominationUserRepository->create($input);

        Flash::success('Nomination User saved successfully.');

        return redirect(route('nominationUsers.index'));
    }

    /**
     * Display the specified NominationUser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $nominationUser = $this->nominationUserRepository->findWithoutFail($id);

        if (empty($nominationUser)) {
            Flash::error('Nomination User not found');

            return redirect(route('nominationUsers.index'));
        }

        return view('nomination_users.show')->with('nominationUser', $nominationUser);
    }

    /**
     * Show the form for editing the specified NominationUser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $nominationUser = $this->nominationUserRepository->findWithoutFail($id);

        if (empty($nominationUser)) {
            Flash::error('Nomination User not found');

            return redirect(route('nominationUsers.index'));
        }

        return view('nomination_users.edit')->with('nominationUser', $nominationUser);
    }

    /**
     * Update the specified NominationUser in storage.
     *
     * @param  int              $id
     * @param UpdateNominationUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNominationUserRequest $request)
    {
        $nominationUser = $this->nominationUserRepository->findWithoutFail($id);

        if (empty($nominationUser)) {
            Flash::error('Nomination User not found');

            return redirect(route('nominationUsers.index'));
        }

        $nominationUser = $this->nominationUserRepository->update($request->all(), $id);

        Flash::success('Nomination User updated successfully.');

        return redirect(route('nominationUsers.index'));
    }

    /**
     * Remove the specified NominationUser from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nominationUser = $this->nominationUserRepository->findWithoutFail($id);

        if (empty($nominationUser)) {
            Flash::error('Nomination User not found');

            return redirect(route('nominationUsers.index'));
        }

        $this->nominationUserRepository->delete($id);

        Flash::success('Nomination User deleted successfully.');

        return redirect(route('nominationUsers.index'));
    }
}

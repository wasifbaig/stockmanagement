<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Repositories\CompanyRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CompanyController extends AppBaseController
{
    /** @var  CompanyRepository */
    private $companyRepository;

    public function __construct(CompanyRepository $companyRepo)
    {
        $this->middleware('auth');
        $this->companyRepository = $companyRepo;
    }

    /**
     * Display a listing of the Company.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->companyRepository->pushCriteria(new RequestCriteria($request));
        $companies = $this->companyRepository->all();

        return view('companies.index')
            ->with('companies', $companies);
    }

    /**
     * Show the form for creating a new Company.
     *
     * @return Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created Company in storage.
     *
     * @param CreateCompanyRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyRequest $request)
    {
        $input = $request->all();

        $company = $this->companyRepository->create($input);

        Flash::success('Company saved successfully.');

        return redirect(route('companies.index'));
    }

    /**
     * Display the specified Company.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $company = $this->companyRepository->findWithoutFail($id);

        if (empty($company)) {
            Flash::error('Company not found');

            return redirect(route('companies.index'));
        }

        return view('companies.show')->with('company', $company);
    }

    /**
     * Show the form for editing the specified Company.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $company = $this->companyRepository->findWithoutFail($id);

        if (empty($company)) {
            Flash::error('Company not found');

            return redirect(route('companies.index'));
        }

        return view('companies.edit')->with('company', $company);
    }

    /**
     * Update the specified Company in storage.
     *
     * @param  int              $id
     * @param UpdateCompanyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompanyRequest $request)
    {
        $company = $this->companyRepository->findWithoutFail($id);

        if (empty($company)) {
            Flash::error('Company not found');

            return redirect(route('companies.index'));
        }

        $company = $this->companyRepository->update($request->all(), $id);

        Flash::success('Company updated successfully.');

        return redirect(route('companies.index'));
    }

    /**
     * Remove the specified Company from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $company = $this->companyRepository->findWithoutFail($id);

        if (empty($company)) {
            Flash::error('Company not found');

            return redirect(route('companies.index'));
        }

        $this->companyRepository->delete($id);

        Flash::success('Company deleted successfully.');

        return redirect(route('companies.index'));
    }
}

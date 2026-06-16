<?php

namespace App\Http\Controllers\Freelancer;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::where(
            'user_id',
            auth()->id()
        )->latest()->get();

        return view(
            'freelancer.portfolios.index',
            compact('portfolios')
        );
    }

    public function create()
    {
        return view(
            'freelancer.portfolios.create'
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image'
        ]);

        $image = null;

        if ($request->hasFile('image')) {

            $image = $request
                ->file('image')
                ->store(
                    'portfolios',
                    'public'
                );
        }

        Portfolio::create([

            'user_id' => auth()->id(),

            'title' => $request->title,

            'description' => $request->description,

            'image' => $image,

            'demo_url' => $request->demo_url,

            'github_url' => $request->github_url

        ]);

        return redirect()
            ->route('portfolio.index')
            ->with(
                'success',
                'Portfolio berhasil ditambahkan'
            );
    }

    // ==========================
    // EDIT PORTFOLIO
    // ==========================

    public function edit(Portfolio $portfolio)
    {
        if ($portfolio->user_id != auth()->id()) {
            abort(403);
        }

        return view(
            'freelancer.portfolios.edit',
            compact('portfolio')
        );
    }

    // ==========================
    // UPDATE PORTFOLIO
    // ==========================

    public function update(
        Request $request,
        Portfolio $portfolio
    ) {

        if ($portfolio->user_id != auth()->id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {

            $image = $request
                ->file('image')
                ->store(
                    'portfolios',
                    'public'
                );

            $portfolio->image = $image;
        }

        $portfolio->title = $request->title;
        $portfolio->description = $request->description;
        $portfolio->demo_url = $request->demo_url;
        $portfolio->github_url = $request->github_url;

        $portfolio->save();

        return redirect()
            ->route('portfolio.index')
            ->with(
                'success',
                'Portfolio berhasil diperbarui'
            );
    }

    // ==========================
    // HAPUS PORTFOLIO
    // ==========================

    public function destroy(
        Portfolio $portfolio
    ) {

        if ($portfolio->user_id != auth()->id()) {
            abort(403);
        }

        $portfolio->delete();

        return redirect()
            ->route('portfolio.index')
            ->with(
                'success',
                'Portfolio berhasil dihapus'
            );
    }
}
<?php

namespace Bytesoft\Gallery\Http\Controllers;

use Bytesoft\Gallery\Repositories\Interfaces\GalleryInterface;
use Bytesoft\SeoHelper\SeoOpenGraph;
use Bytesoft\Slug\Repositories\Interfaces\SlugInterface;
use Gallery;
use Illuminate\Routing\Controller;
use SeoHelper;
use Theme;

class PublicController extends Controller
{

    /**
     * @var GalleryInterface
     */
    protected $galleryRepository;

    /**
     * @var SlugInterface
     */
    protected $slugRepository;

    /**
     * PublicController constructor.
     * @param GalleryInterface $galleryRepository
     * @param SlugInterface $slugRepository
     * @author Bytesoft
     */
    public function __construct(GalleryInterface $galleryRepository, SlugInterface $slugRepository)
    {
        $this->galleryRepository = $galleryRepository;
        $this->slugRepository = $slugRepository;
    }

    /**
     * @author Bytesoft
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function getGalleries()
    {
        Gallery::registerAssets();
        $galleries = $this->galleryRepository->getAll();

        SeoHelper::setTitle(__('Galleries'));

        Theme::breadcrumb()
            ->add(__('Home'), route('public.index'))
            ->add(__('Galleries'), route('public.galleries'));
        return Theme::scope('galleries', compact('galleries'), 'plugins.gallery::themes.galleries')->render();
    }

    /**
     * @param $slug
     * @return \Illuminate\Http\Response|\Response
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @author Bytesoft
     */
    public function getGallery($slug)
    {
        $slug = $this->slugRepository->getFirstBy(['key' => $slug, 'reference' => GALLERY_MODULE_SCREEN_NAME]);
        if (!$slug) {
            abort(404);
        }
        $gallery = $this->galleryRepository->getFirstBy(['id' => $slug->reference_id, 'status' => 1]);

        if (!$gallery) {
            abort(404);
        }

        SeoHelper::setTitle($gallery->name)->setDescription($gallery->description);

        $meta = new SeoOpenGraph();
        $meta->setDescription($gallery->description);
        $meta->setUrl(route('public.gallery', $slug->key));
        $meta->setTitle($gallery->name);
        $meta->setType('article');

        Gallery::registerAssets();

        Theme::breadcrumb()->add(__('Home'), route('public.index'))->add($gallery->name, route('public.gallery', $slug->key));

        do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, GALLERY_MODULE_SCREEN_NAME, $gallery);

        return Theme::scope('gallery', compact('gallery'), 'plugins.gallery::themes.gallery')->render();
    }
}

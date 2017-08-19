<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const STATUS = 'status';
    const MESSAGE = 'message';
    const RESPONSE_CODE = 'response_code';

    /** @var  [] */
    protected $pageDataArray;

    public function __construct()
    {
        $this->pageDataArray = [
            'page.title' => '',
            'bread.one' => '',
            'bread.two' => '',
            'bread.three' => '',
        ];
    }

    /**
     * @param string $status
     * @param string $message
     * @param int $responseCode
     * @param array $extras
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function generateResponse(
        string $status,
        string $message,
        int $responseCode,
        array $extras = []
    ): JsonResponse
    {
        return response()->json([
                static::STATUS => $status,
                static::MESSAGE => $message,
            ] + $extras, $responseCode);
    }

    /**
     * @param string $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendSuccess(string $message): JsonResponse
    {
        return $this->generateResponse('success', $message, Response::HTTP_OK);
    }

    /**
     * @param string $message
     * @param int $responseCode
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendError(string $message, int $responseCode = Response::HTTP_INTERNAL_SERVER_ERROR): JsonResponse
    {
        return $this->generateResponse('error', $message, $responseCode);
    }

    /**
     * @param array $array
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendJsonHtml(array $array): JsonResponse
    {
        return $this->generateResponse('success', '', Response::HTTP_OK, $array);
    }

}
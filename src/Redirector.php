<?php

namespace Imanghafoori\HeyMan;

class Redirector
{
    private $responder;

    /**
     * Redirector constructor.
     *
     * @param \Imanghafoori\HeyMan\Responder $responder
     */
    public function __construct(Responder $responder)
    {
        $this->responder = $responder;
    }

    /**
     * Flash a piece of data to the session.
     *
     * @param  string|array  $key
     * @param  mixed  $value
     * @return $this
     */
    public function with($key, $value = null)
    {
        $this->responder->response[] = ['with', func_get_args()];
        return $this;
    }

    /**
     * Add multiple cookies to the response.
     *
     * @param  array  $cookies
     * @return $this
     */
    public function withCookies(array $cookies)
    {
        $this->responder->response[] = ['withCookies', func_get_args()];
        return $this;
    }

    /**
     * Flash an array of input to the session.
     *
     * @param  array  $input
     * @return $this
     */
    public function withInput(array $input = null)
    {
        $this->responder->response[] = ['withInput', func_get_args()];
        return $this;
    }

    /**
     * Flash an array of input to the session.
     *
     * @return $this
     */
    public function onlyInput()
    {
        $this->responder->response[] = ['onlyInput', func_get_args()];
        return $this;
    }

    /**
     * Flash an array of input to the session.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function exceptInput()
    {
        $this->responder->response[] = ['exceptInput', func_get_args()];
        return $this;
    }

    /**
     * Flash a container of errors to the session.
     *
     * @param  \Illuminate\Contracts\Support\MessageProvider|array|string  $provider
     * @param  string  $key
     * @return $this
     */
    public function withErrors($provider, $key = 'default')
    {
        $this->responder->response[] = ['withErrors', func_get_args()];
        return $this;
    }


    /**
     * Dynamically bind flash data in the session.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return $this
     *
     * @throws \BadMethodCallException
     */
    public function __call($method, $parameters)
    {
        $this->responder->response[] = [$method, func_get_args()];
        return $this;
    }
}
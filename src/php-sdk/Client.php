<?php

namespace MR\SDK;

use MR\SDK\Auth\OAuth;
use MR\SDK\TokenStorage\TokenStorageInterface;
use MR\SDK\Transport\Request;
use GuzzleHttp\HandlerStack;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class Client
{
    const OPT_FOLLOW_LOCATION = 'follow_location';
    const OPT_ERRMODE_EXCEPTION = 'errmode_exception';

    /**
     * @var Request
     */
    private $request;

    /**
     * @var OAuth
     */
    private $auth;

    /**
     * @var Endpoints\Endpoint[]
     */
    private $cachedEndpoints = [];

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var string
     */
    private $tokenCacheKey;

    /**
     * @param $host
     * @param $clientId
     * @param $clientSecret
     * @param $tokenCacheKey
     * @param TokenStorageInterface|null $storage
     * @param null                       $logger
     * @param HandlerStack|null          $handlerStack
     * @param array                      $options
     */
    public function __construct(
        string $host,
        string $clientId,
        string $clientSecret,
        string $tokenCacheKey,
        TokenStorageInterface $storage = null,
        LoggerInterface $logger = null,
        HandlerStack $handlerStack = null,
        array $options = []
    ) {
        $this->logger = $logger ?: new NullLogger();
        $this->auth = new OAuth($this, $clientId, $clientSecret, $storage, $options);
        $this->request = new Request($this, $host, $handlerStack);

        $this->tokenCacheKey = $tokenCacheKey;
        $this->options = $options;
    }

    /**
     * @return Endpoints\MeEndpoint|Endpoints\Endpoint
     */
    public function me()
    {
        return $this->getEndpoint(Endpoints\MeEndpoint::class);
    }

    /**
     * @return Endpoints\UserEndpoint|Endpoints\Endpoint
     */
    public function users()
    {
        return $this->getEndpoint(Endpoints\UserEndpoint::class);
    }

    /**
     * @return Endpoints\ForgotPasswordEndPoint|Endpoints\Endpoint
     */
    public function forgetPassword()
    {
        return $this->getEndpoint(Endpoints\ForgotPasswordEndpoint::class);
    }

    /**
     * @return Endpoints\GroupEndpoint|Endpoints\Endpoint
     */
    public function groups()
    {
        return $this->getEndpoint(Endpoints\GroupEndpoint::class);
    }

    /**
     * @return Endpoints\AssociationEndpoint|Endpoints\Endpoint
     */
    public function associations()
    {
        return $this->getEndpoint(Endpoints\AssociationEndpoint::class);
    }

    /**
     * @return Endpoints\HallNumericEndpoint|Endpoints\Endpoint
     */
    public function hallNumerics()
    {
        return $this->getEndpoint(Endpoints\HallNumericEndpoint::class);
    }

    /**
     * @return Endpoints\MarketEndpoint|Endpoints\Endpoint
     */
    public function markets()
    {
        return $this->getEndpoint(Endpoints\MarketEndpoint::class);
    }

    /**
     * @return Endpoints\ShopEndpoint|Endpoints\Endpoint
     */
    public function shops()
    {
        return $this->getEndpoint(Endpoints\ShopEndpoint::class);
    }

    /**
     * @return Endpoints\CityHallEndpoint|Endpoints\Endpoint
     */
    public function cityHalls()
    {
        return $this->getEndpoint(Endpoints\CityHallEndpoint::class);
    }

    /**
     * @return Endpoints\RealEstatePlayerEndpoint|Endpoints\Endpoint
     */
    public function realEstatePlayers()
    {
        return $this->getEndpoint(Endpoints\RealEstatePlayerEndpoint::class);
    }

    /**
     * @return Endpoints\LotEndpoint|Endpoints\Endpoint
     */
    public function lots()
    {
        return $this->getEndpoint(Endpoints\LotEndpoint::class);
    }

    /**
     * @return Endpoints\MitrustEndpoint|Endpoints\Endpoint
     */
    public function mitrusts()
    {
        return $this->getEndpoint(Endpoints\MitrustEndpoint::class);
    }

    /**
     * @return Endpoints\PlaceEndpoint|Endpoints\Endpoint
     */
    public function places()
    {
        return $this->getEndpoint(Endpoints\PlaceEndpoint::class);
    }

    /**
     * @return Endpoints\CategoryEndpoint|Endpoints\Endpoint
     */
    public function categories()
    {
        return $this->getEndpoint(Endpoints\CategoryEndpoint::class);
    }

    /**
     * @return Endpoints\RoleEndpoint|Endpoints\Endpoint
     */
    public function roles()
    {
        return $this->getEndpoint(Endpoints\RoleEndpoint::class);
    }

    /**
     * @return Endpoints\MemberOfEndpoint|Endpoints\Endpoint
     */
    public function members()
    {
        return $this->getEndpoint(Endpoints\MemberOfEndpoint::class);
    }

    /**
     * @return Endpoints\TopicEndpoint|Endpoints\Endpoint
     */
    public function topics()
    {
        return $this->getEndpoint(Endpoints\TopicEndpoint::class);
    }

    /**
     * @return Endpoints\LikeEndpoint|Endpoints\Endpoint
     */
    public function likes()
    {
        return $this->getEndpoint(Endpoints\LikeEndpoint::class);
    }

    /**
     * @return Endpoints\FollowEndpoint|Endpoints\Endpoint
     */
    public function follows()
    {
        return $this->getEndpoint(Endpoints\FollowEndpoint::class);
    }

    /**
     * @return Endpoints\ParticipateEndpoint|Endpoints\Endpoint
     */
    public function participates()
    {
        return $this->getEndpoint(Endpoints\ParticipateEndpoint::class);
    }

    /**
     * @return Endpoints\CommentEndpoint|Endpoints\Endpoint
     */
    public function comments()
    {
        return $this->getEndpoint(Endpoints\CommentEndpoint::class);
    }

    /**
     * @return Endpoints\DemandEndpoint|Endpoints\Endpoint
     */
    public function demands()
    {
        return $this->getEndpoint(Endpoints\DemandEndpoint::class);
    }

    /**
     * @return Endpoints\DonationEndpoint|Endpoints\Endpoint
     */
    public function donations()
    {
        return $this->getEndpoint(Endpoints\DonationEndpoint::class);
    }

    /**
     * @return Endpoints\EventEndpoint|Endpoints\Endpoint
     */
    public function events()
    {
        return $this->getEndpoint(Endpoints\EventEndpoint::class);
    }

    /**
     * @return Endpoints\PushEndpoint|Endpoints\Endpoint
     */
    public function pushes()
    {
        return $this->getEndpoint(Endpoints\PushEndpoint::class);
    }

    /**
     * @return Endpoints\CivicActionEndpoint|Endpoints\Endpoint
     */
    public function civicActions()
    {
        return $this->getEndpoint(Endpoints\CivicActionEndpoint::class);
    }

    /**
     * @return Endpoints\PollEndpoint|Endpoints\Endpoint
     */
    public function polls()
    {
        return $this->getEndpoint(Endpoints\PollEndpoint::class);
    }

    /**
     * @return Endpoints\NewsEndpoint|Endpoints\Endpoint
     */
    public function news()
    {
        return $this->getEndpoint(Endpoints\NewsEndpoint::class);
    }

    /**
     * @return Endpoints\AlertEndpoint|Endpoints\Endpoint
     */
    public function alerts()
    {
        return $this->getEndpoint(Endpoints\AlertEndpoint::class);
    }

    /**
     * @return Endpoints\RecommendationEndpoint|Endpoints\Endpoint
     */
    public function recommendations()
    {
        return $this->getEndpoint(Endpoints\RecommendationEndpoint::class);
    }

    /**
     * @return Endpoints\ShareEndpoint|Endpoints\Endpoint
     */
    public function shares()
    {
        return $this->getEndpoint(Endpoints\ShareEndpoint::class);
    }

    /**
     * @return Endpoints\TradeEndpoint|Endpoints\Endpoint
     */
    public function trades()
    {
        return $this->getEndpoint(Endpoints\TradeEndpoint::class);
    }

    /**
     * @return Endpoints\TransactionEndpoint|Endpoints\Endpoint
     */
    public function transactions()
    {
        return $this->getEndpoint(Endpoints\TransactionEndpoint::class);
    }

    /**
     * @return Endpoints\ServiceEndpoint|Endpoints\Endpoint
     */
    public function services()
    {
        return $this->getEndpoint(Endpoints\ServiceEndpoint::class);
    }

    /**
     * @return Endpoints\ServiceEndpoint|Endpoints\Endpoint
     */
    public function serviceWorkflows()
    {
        return $this->getEndpoint(Endpoints\ServiceWorkflow::class);
    }

    /**
     * @return Endpoints\MediaEndpoint|Endpoints\Endpoint
     */
    public function medias()
    {
        return $this->getEndpoint(Endpoints\MediaEndpoint::class);
    }

    /**
     * @return Endpoints\NewsletterEndpoint|Endpoints\Endpoint
     */
    public function newsletters()
    {
        return $this->getEndpoint(Endpoints\NewsletterEndpoint::class);
    }

    /**
     * @return Endpoints\WidgetEndpoint|Endpoints\Endpoint
     */
    public function widgets()
    {
        return $this->getEndpoint(Endpoints\WidgetEndpoint::class);
    }

    /**
     * @return Endpoints\PublicationEndpoint|Endpoints\Endpoint
     */
    public function publications()
    {
        return $this->getEndpoint(Endpoints\PublicationEndpoint::class);
    }

    /**
     * @return Endpoints\ProfileEndpoint|Endpoints\Endpoint
     */
    public function profiles()
    {
        return $this->getEndpoint(Endpoints\ProfileEndpoint::class);
    }

    /**
     * @return Endpoints\SitemapEndpoint|Endpoints\Endpoint
     */
    public function sitemap()
    {
        return $this->getEndpoint(Endpoints\SitemapEndpoint::class);
    }

    /**
     * @return Endpoints\LendObjectEndpoint|Endpoints\Endpoint
     */
    public function lendObjects()
    {
        return $this->getEndpoint(Endpoints\LendObjectEndpoint::class);
    }

    /**
     * @return Endpoints\JoinRequestEndpoint|Endpoints\Endpoint
     */
    public function joinRequests()
    {
        return $this->getEndpoint(Endpoints\JoinRequestEndpoint::class);
    }

    /**
     * @return Endpoints\ContactEndpoint|Endpoints\Endpoint
     */
    public function contacts()
    {
        return $this->getEndpoint(Endpoints\ContactEndpoint::class);
    }

    /**
     * @return Endpoints\CustomerEndpoint|Endpoints\Endpoint
     */
    public function customers()
    {
        return $this->getEndpoint(Endpoints\CustomerEndpoint::class);
    }

    /**
     * @return Endpoints\InvitationEndpoint|Endpoints\Endpoint
     */
    public function invitations()
    {
        return $this->getEndpoint(Endpoints\InvitationEndpoint::class);
    }

    /**
     * @return Endpoints\TeamEndpoint|Endpoints\Endpoint
     */
    public function teams()
    {
        return $this->getEndpoint(Endpoints\TeamEndpoint::class);
    }

    /**
     * @return Endpoints\BlackListEndpoint|Endpoints\Endpoint
     */
    public function blacklists()
    {
        return $this->getEndpoint(Endpoints\BlackListEndpoint::class);
    }

    /**
     * @return Endpoints\ModerationEndPoint|Endpoints\Endpoint
     */
    public function moderation()
    {
        return $this->getEndpoint(Endpoints\ModerationEndPoint::class);
    }

    /**
     * @return Endpoints\NotificationEndpoint|Endpoints\Endpoint
     */
    public function notifications()
    {
        return $this->getEndpoint(Endpoints\NotificationEndpoint::class);
    }

    /**
     * @return Endpoints\CardEndpoint|Endpoints\Endpoint
     */
    public function card()
    {
        return $this->getEndpoint(Endpoints\CardEndpoint::class);
    }

    /**
     * @return Endpoints\BookmarkEndpoint|Endpoints\Endpoint
     */
    public function bookmarks()
    {
        return $this->getEndpoint(Endpoints\BookmarkEndpoint::class);
    }

    /**
     * @param string $type
     *
     * @return Endpoints\Endpoint
     */
    public function endpoints($type)
    {
        // check if methods exist
        if (method_exists($this, $type)) {
            return call_user_func_array([$this, $type], []);
        }

        // check in cache
        if (isset($this->cachedEndpoints[$type])) {
            return $this->cachedEndpoints[$type];
        }

        $toCamelCase = function ($name) {
            return lcfirst(preg_replace_callback('/(^|_|\.)+(.)/', function ($match) {
                return ('.' === $match[1] ? '_' : '').strtoupper($match[2]);
            }, $name));
        };

        // check if camel case method exists
        $typeCamelCase = $toCamelCase($type);
        if (method_exists($this, $typeCamelCase)) {
            return call_user_func_array([$this, $typeCamelCase], []);
        }

        // if not check plural form
        if (substr($type, -1) != 's') {
            $typePlural = sprintf('%ss', $type);
        } else {
            $typePlural = rtrim($type, 's');
        }

        if (method_exists($this, $typePlural)) {
            return call_user_func_array([$this, $typePlural], []);
        }

        // check in cache
        if (isset($this->cachedEndpoints[$typePlural])) {
            return $this->cachedEndpoints[$typePlural];
        }

        // check if camel case method exists
        $typePluralCamelCase = $toCamelCase($typePlural);
        if (method_exists($this, $typePluralCamelCase)) {
            return call_user_func_array([$this, $typePluralCamelCase], []);
        }

        throw new \InvalidArgumentException("Unknown endpoint type $type");
    }

    private function getEndpoint(string $class): Endpoints\Endpoint
    {
        $endpoint = $class::getBaseUri();
        if (!isset($this->cachedEndpoints[$endpoint])) {
            $this->cachedEndpoints[$endpoint] = new $class($this->request);
        }

        return $this->cachedEndpoints[$endpoint];
    }

    /**
     * @return Request
     */
    public function request()
    {
        return $this->request;
    }

    /**
     * @return OAuth
     */
    public function auth()
    {
        return $this->auth;
    }

    /**
     * @return string
     */
    public function getTokenCacheKey()
    {
        return $this->tokenCacheKey;
    }

    /**
     * @return LoggerInterface
     */
    public function getLogger()
    {
        return $this->logger;
    }

    /**
     * @param string $option
     * @param mixed  $value
     *
     * @return Client
     */
    public function setOption($option, $value)
    {
        $this->options[$option] = $value;

        return $this;
    }

    /**
     * @param string $option
     *
     * @return mixed
     */
    public function getOption($option)
    {
        return isset($this->options[$option]) ? $this->options[$option] : null;
    }

    /**
     * @param array    $options
     * @param callable $fn
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function withOptions(array $options, callable $fn)
    {
        $result = null;

        try {
            $previous = [];
            foreach ($options as $key => $value) {
                $previous[$key] = $this->getOption($key);
                $this->setOption($key, $value);
            }

            $result = $fn();
        } catch (\Exception $e) {
            throw $e;
        } finally {
            foreach ($previous as $key => $value) {
                $this->setOption($key, $value);
            }
        }

        return $result;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Apis\Client as Google_Client;
use Google_Service_Gmail;
use Google_Service_Gmail_Draft;

class GmailDraftController extends Controller
{
    //
    public function getDrafts(Request $request)
    {
        $clientId = env('GOOGLE_CLIENT_ID');
        $clientSecret = env('GOOGLE_CLIENT_SECRET');
        $redirectUri = env('GOOGLE_REDIRECT_URI');

        $client = new Google_Client();
        $client->setClientId($clientId);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri($redirectUri);
        $client->addScope(Google_Service_Gmail::GMAIL);

        $service = new Google_Service_Gmail($client);

        $userId = 'me';

        $optParams = [
            'maxResults' => 10,
            'pageToken' => '',
            'q' => '',
            'includeSpamTrash' => false
        ];

        $drafts = $service->users_drafts->listUsersDrafts($userId, $optParams);

        $draftsArray = [];

        foreach ($drafts->getDrafts() as $draft) {
            $draftArray = [
                'id' => $draft->getId(),
                'messageId' => $draft->getMessage()->getId(),
                'threadId' => $draft->getMessage()->getThreadId()
            ];

            $draftsArray[] = $draftArray;
        }

        return response()->json([
            'drafts' => $draftsArray,
            'nextPageToken' => $drafts->getNextPageToken(),
            'resultSizeEstimate' => $drafts->getResultSizeEstimate()
        ]);
    }
 
}

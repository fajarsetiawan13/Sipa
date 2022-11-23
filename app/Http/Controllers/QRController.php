<?php

namespace App\Http\Controllers;

use App\Models\Information;
use App\Models\Location;
use App\Models\User;

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class QRController extends Controller
{
    public function generate(User $user)
    {
        $options = new QROptions([
            'version' => 3,
            'outputType' => QRCode::OUTPUT_IMAGE_PNG,
            'eccLevel' => QRCode::ECC_M,
        ]);

        $qrcode = new QRCode($options);

        // $randomCode = uniqid('sipa') . $user->id;
        $randomCode = bin2hex(random_bytes(3)) . $user->id;
        $imgName = date('Ymd-') . $randomCode . '.png';

        $data = url('') . '/' . $randomCode;

        $qrcode->render($data, 'img/qr/' . $imgName);

        $informationData['qr_url'] = $data;
        $informationData['qr_page'] = $randomCode;
        $informationData['qr_image'] = 'img/qr/' . $imgName;

        // Check QR Image on Storage
        $qrImage = Information::where('user_id', $user->id)->get();

        if ($qrImage[0]->qr_image) {
            File::delete($qrImage[0]->qr_image);
        }

        Information::where('user_id', $user->id)->update($informationData);
        return back();
    }

    public function userPage(Information $information)
    {
        return view('main.meet', [
            'title' => 'Informasi ODD',
            'information' => $information->load(['user.images', 'user.contact']),
        ]);
    }

    public function userMeet(Request $request, User $user)
    {
        $data['user_id'] = $user->id;
        $data['latitude'] = $request->latitude;
        $data['longitude'] = $request->longitude;
        $data['recent_location'] = 'Indonesia';

        Location::create($data);
        return back()->with('success', 'Terima kasih telah berbagi lokasi! keluarga akan segera datang ketempat Anda.');
    }
}

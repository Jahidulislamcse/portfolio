<?php

use App\Models\User;
use App\Models\Brand;
use Illuminate\Http\UploadedFile;

test('admin can upload brand image and save to root upload folder', function () {
    // Find or create an admin user
    $user = User::where('email', 'admin@gmail.com')->first();
    if (!$user) {
        $user = User::factory()->create(['role' => 'admin']);
    } else {
        $user->update(['role' => 'admin']);
    }

    // Prepare a mock uploaded file
    $file = UploadedFile::fake()->image('test_brand_logo.png');

    // Send post request to create brand
    $response = $this
        ->actingAs($user)
        ->post(route('admin.brands.store'), [
            'name' => 'Automated Test Brand',
            'image' => $file,
        ]);

    $response->assertRedirect(route('admin.brands.index'));

    // Check brand database record
    $brand = Brand::where('name', 'Automated Test Brand')->first();
    expect($brand)->not->toBeNull();
    expect($brand->image)->toStartWith('brands/');

    // Check if the file was stored in public_path('upload/' . $brand->image)
    $expectedPath = public_path('upload/' . $brand->image);
    expect(file_exists($expectedPath))->toBeTrue();

    // Verify it is in the root directory 'upload' and not 'public/upload'
    // Normalize path slashes to match the OS format
    $normalizedPath = str_replace('\\', '/', $expectedPath);
    expect($normalizedPath)->not->toContain('/public/upload');

    // Clean up
    if (file_exists($expectedPath)) {
        unlink($expectedPath);
    }
    $brand->delete();
});


# nijwel/image-upload
A simple and flexible PHP package for handling image uploads, resizing, and management.

## Features

- Upload images with support for multiple formats (JPEG, PNG, GIF, WEBP).
- Resize images while maintaining aspect ratio.
- Save images with dynamic filenames and custom paths.

## Installation

You can install the `nijwel/image-upload` package via Composer. Run the following command in your project directory:

```bash
composer require nijwel/image-upload
```

## Configuration
No configuration is required to start using the package. However, you can customize paths and image dimensions as needed.

# Usage

## Basic Example

Here’s a simple example of how to use the package to upload and resize an image:

```bash

use Nijwel\ImageUpload\ImageUpload;

$image = $request->input('image'); // Input image.
$newImageName = 'my_image'; // IF you want to rename image (Also you can send null value) .
$width = 200; // Desired width, (if you want to original image width pass value 0 or null).  
$height = null; // Desired height (null means maintain aspect ratio , You can handle manually)
$path = 'backend/assets/images/'; // Directory to save the image

// Just call in your method
imageUpload($image, $width, $height, $path ,$newImageName );


```

## Methods
`imageUpload($file, $newImageName = null, $width = null, $height = null, $path = 'images/')`

Uploads and resizes the image.

- file: Path to the original image file.
- newImageName: Name for the image (optional, a unique ID is used if not provided).
- width: Width for the resized image (optional).
- height: Height for the resized image (optional). If null or 0, the aspect ratio is maintained.
- path: Directory path to save the resized image (optional).

## Error Handling
Ensure that the provided image path is correct and that the directory has appropriate write permissions. The package will throw exceptions for unsupported image types or invalid paths.

## Contributing

If you'd like to contribute to the development of this package, please follow these steps:

1. Fork the repository.
2. Create a feature branch.
3. Commit your changes.
4. Push your branch and submit a pull request.

## License
This package is licensed under the MIT License. See the LICENSE file for more details.

## Contact

For any issues or questions, please open an issue on the repository or contact nijwel09@gmail.com

You can visit this repository : https://github.com/nijwel/image-upload.git

# Index.php

## Description
The `Index` class is a Livewire component used for managing contact information. It allows users to save, update, retrieve, and list contact details such as mobile number, email, address, city, state, and pincode. The component interacts with the `Contact`, `City`, `State`, and `Pincode` models to perform CRUD operations.

## Usage Examples
1. Saving a new contact:
```php
$index = new Index();
$index->vname = 'John Doe';
$index->mobile = '1234567890';
$index->email = 'john.doe@example.com';
// Set other contact details
$message = $index->getSave();
echo $message; // Output: "Saved"
```

2. Updating an existing contact:
```php
$index = new Index();
$index->vid = 1; // ID of the contact to update
$index->vname = 'Jane Smith';
// Update other contact details
$message = $index->getSave();
echo $message; // Output: "Updated"
```

3. Retrieving a specific contact:
```php
$index = new Index();
$obj = $index->getObj(1); // Get contact with ID 1
print_r($obj); // Output: Contact object details
```

4. Listing contacts based on search criteria:
```php
$index = new Index();
$contactsList = $index->getList(); // Retrieve paginated list of contacts
print_r($contactsList); // Output: Paginated list of contacts based on search criteria
```

## Parameters
- `$mobile`: String representing the mobile number of the contact.
- `$whatsapp`: String representing the WhatsApp number of the contact.
- `$email`: String representing the email address of the contact.
- `$gstin`: String representing the GSTIN (Goods and Services Tax Identification Number) of the contact.
- `$address_1`: String representing the first line of address of the contact.
- `$address_2`: String representing the second line of address of the contact.
- `$city_id`: String representing the ID of the city associated with the contact.
- `$state_id`: String representing the ID of the state associated with the contact.
- `$pincode_id`: String representing the ID of the pincode associated with the contact.

## Return Values
- `getSave()`: Returns a string message indicating whether a new contact was saved or an existing one was updated.

## Additional Notes
- The component uses common traits for shared functionality.
- The `mount()` method initializes lists of cities, states, and pincodes when mounting the component.
- The `reRender()` method forces a re-rendering of Livewire components.
- The `render()` method returns a view containing a list of contacts based on search criteria.

Ensure that you have appropriate permissions and authentication mechanisms in place when using this component in your application.
